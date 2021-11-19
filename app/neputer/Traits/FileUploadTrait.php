<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 5/18/2018
 * Time: 9:02 AM
 */

namespace Neputer\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

trait FileUploadTrait
{
    /**
     * Process image uploading for both store() and update() method
     *
     * @param Request $request
     * @param string $request_for Decides request is coming from store() or update()
     * @param null $image_name Decides either update() request has existing image or not
     */
    public function _uploadImage(Request $request, $request_for = 'store', $image_name = null, $image_object = null)
    {
        $this->image_name = $image_name;

        if($image_object) {
            $image = $image_object;
        } else {
            $image = $request->file('photo');
        }

        // if image exist, first upload image
        if ($image) {
            $this->image_name = time() . mt_rand(4100, 9999) . "_" . $image->getClientOriginalName();

            // check and create folder if not exist
            if (!file_exists($this->folder_path)) {
                File::makeDirectory($this->folder_path, 0775, true);
            }

            $image->move($this->folder_path, $this->image_name);
            if ($request_for == 'update') {
                if ($image_name) {
                    if (file_exists($this->folder_path . DIRECTORY_SEPARATOR .$image_name)) {
                        unlink($this->folder_path . DIRECTORY_SEPARATOR . $image_name);
                    }
                }
            }

        }
    }

    /**
     * Creates different size thumbs for uploaded image
     *
     * @param Request $request
     * @param string $request_for Defines what type of request
     * @param null $image_name will have value if request_for is update
     */
    public function uploadImageThumbs(Request $request, $request_for = 'store', $image_name = null,$image_object = null)
    {
//        dd($this->image_dimensions);
//        $image = $request->file('photo');
        if($image_object) {
            $image = $image_object;
        } else {
            $image = $request->file('photo');
        }
        if ($image) {
            $image_dimansions = $this->image_dimensions;

            foreach ($image_dimansions as $image_dimansion) {
                // open and resize an image file
                $img = Image::make($this->folder_path . DIRECTORY_SEPARATOR . $this->image_name)->resize($image_dimansion['width'], $image_dimansion['height']);
                // save file as jpg with medium quality
                $img->save($this->folder_path . DIRECTORY_SEPARATOR . $image_dimansion['width'] . '_' . $image_dimansion['height'] . '_' . $this->image_name, 75);
            }

            if ($request_for == 'update') {
                // remove old image thumb images
                foreach ($this->image_dimensions as $image_dimansion) {
                        if (file_exists($this->folder_path . DIRECTORY_SEPARATOR . $image_dimansion['width'] . '_' . $image_dimansion['height'] . '_' . $image_name)) {
                            unlink($this->folder_path . DIRECTORY_SEPARATOR . $image_dimansion['width'] . '_' . $image_dimansion['height'] . '_' . $image_name);
                    }
                }
            }

        }
    }

    public function removeImage($image_name)
    {
        if ($image_name) {

            if (file_exists($this->folder_path . DIRECTORY_SEPARATOR . $image_name))
                unlink($this->folder_path . DIRECTORY_SEPARATOR . $image_name);

        }
    }

    public function removeImageThumbs($image_name, $dimensions = null)
    {
        if ($image_name) {

            $image_dimensions = $dimensions?$dimensions:$this->image_dimensions;

            // remove old image thumb images
            foreach ($image_dimensions as $image_dimension) {
                if (file_exists($this->folder_path . DIRECTORY_SEPARATOR . $image_dimension['width'] . '_' . $image_dimension['height'] . '_' . $image_name)) {
                    unlink($this->folder_path . DIRECTORY_SEPARATOR . $image_dimension['width'] . '_' . $image_dimension['height'] . '_' . $image_name);
                }
            }

        }
    }

    public function createFolderIfNotExist()
    {
        if (!file_exists($this->folder_path)) {
            File::makeDirectory($this->folder_path, 0775, true);
        }
    }

}
