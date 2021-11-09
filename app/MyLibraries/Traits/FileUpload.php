<?php
/**
 * Created by PhpStorm.
 * User: shant0s
 * Date: 5/18/2018
 * Time: 11:01 PM
 */

namespace App\MyLibraries\Traits;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

trait FileUpload
{

      /**
     * Process image upload for both store() and update() method
     *
     * @param Request $request
     * @param string $request_for Decides whether request is to store or update()
     * @param null $image_name Decides either update() request has existing image or not
     */
    public function uploadImage(Request $request, $request_for = 'store', $image_name = null){

        $imageFile = $request->file('image') ?? $request->file('file');
        $image = property_exists($this, 'image_request') && $this->image_request?$this->image_request:$imageFile;

        if($image){
//            $image = $imageFile;
            $this->image_name = time().mt_rand(4100, 9999).'_'.$image->getClientOriginalName();

            if(!file_exists($this->folder_path)){
                File::makeDirectory($this->folder_path, 0775, true);
            }

            $image->move($this->folder_path, $this->image_name);


            if($request_for == 'update'){
                if($image_name && file_exists($this->folder_path.DIRECTORY_SEPARATOR.$image_name)){
                    unlink($this->folder_path.DIRECTORY_SEPARATOR.$image_name);
                }
            }

        }

    }

    public function uploadImageThumbs(Request $request, $request_for = 'store', $image_name = null){

        //TODO: optimization still remained
        $image = property_exists($this, 'image_request') && $this->image_request?$this->image_request:$request->file('image');

        if($image){

            $image_dimensions = property_exists($this, 'use_image_dimensions') && $this->use_image_dimensions?$this->gallery_image_dimensions:$this->image_dimensions;

            foreach($image_dimensions as $image_dimension){
                //open and resize image file
                $img = Image::make($this->folder_path.DIRECTORY_SEPARATOR.$this->image_name)->resize($image_dimension['width'], $image_dimension['height']);
                //save file as jpg in medium quality
                $img->save($this->folder_path.DIRECTORY_SEPARATOR.$image_dimension['width'].'_'.$image_dimension['height'].'_'.$this->image_name, 75);
            }

            if($request_for == 'update'){
                foreach ($this->image_dimensions as $image_dimension){
                    if(file_exists($this->folder_path.DIRECTORY_SEPARATOR.$image_dimension['width'].'_'.$image_dimension['height'].'_'.$image_name)){
                        unlink($this->folder_path.DIRECTORY_SEPARATOR.$image_dimension['width'].'_'.$image_dimension['height'].'_'.$image_name);
                    }
                }
            }

        }
    }

    public function uploadGalleryImageThumbs(Request $request, $request_for = 'store', $image_name = null){

        $image = property_exists($this, 'image_request') && $this->image_request?$this->image_request:$request->file('image');

        if($image){

            foreach($this->gallery_image_dimensions as $image_dimension){
                //open and resize image file
                $img = Image::make($this->folder_path.DIRECTORY_SEPARATOR.$this->image_name)->resize($image_dimension['width'], $image_dimension['height']);
                //save file as jpg in medium quality
                $img->save($this->folder_path.DIRECTORY_SEPARATOR.$image_dimension['width'].'_'.$image_dimension['height'].'_'.$this->image_name, 75);
            }

            if($request_for == 'update'){
                foreach ($this->image_dimensions as $image_dimension){
                    if(file_exists($this->folder_path.DIRECTORY_SEPARATOR.$image_dimension['width'].'_'.$image_dimension['height'].'_'.$image_name)){
                        unlink($this->folder_path.DIRECTORY_SEPARATOR.$image_dimension['width'].'_'.$image_dimension['height'].'_'.$image_name);
                    }
                }
            }

        }
    }

    public function removeImage($image_name){

        if($image_name){
            if(file_exists($this->folder_path.DIRECTORY_SEPARATOR.$image_name))
                unlink($this->folder_path.DIRECTORY_SEPARATOR.$image_name);
        }

    }

    public function removeImageThumbs($image_name, $dimension = null){
        if($image_name){

            $image_dimensions = $dimension?$dimension:$this->image_dimensions;

            foreach ($image_dimensions as $image_dimension){
                if(file_exists($this->folder_path.DIRECTORY_SEPARATOR.$image_dimension['width'].'_'.$image_dimension['height'].'_'.$image_name)){
                    unlink($this->folder_path.DIRECTORY_SEPARATOR.$image_dimension['width'].'_'.$image_dimension['height'].'_'.$image_name);
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