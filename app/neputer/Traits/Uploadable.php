<?php

namespace Neputer\Traits;


trait Uploadable
{
    protected $defaultDimensions = [
        [
            'height' => '200',
            'width'  => '200',
        ]
    ];
    /**
     * Upload image and return name
     * @param $image
     * @return string
     */
    protected function uploadImage( $image )
    {

        $new = uniqid().time().'.'.$image->getClientOriginalExtension();
        $image->move($this->folder_path, $new);
        $dimensions = $this->getDimensions();
        if ($dimensions) {
            foreach ($dimensions as $dimension) {
                $img = app('image')->make($this->folder_path.$new)->resize(
                    $dimension['width'], $dimension['height']
                );
                $img->save($this->folder_path.$dimension['width'].'_'.$dimension['height'].'_'.$new);
            }
        }
        return $new;
    }
    /**
     * Removing the images
     * @param $image
     */
    protected function removeImage( $image )
    {
        if ($image) {
            if (file_exists($this->folder_path.$image)) {
                unlink($this->folder_path.$image);
            }
            $dimensions = $this->getDimensions();
            if ($dimensions)
                foreach ($dimensions as $dimension) {
                    $file = $this->folder_path.$dimension['width'].'_'.$dimension['height'].'_'.$image;
                    if (file_exists($file)) {
                        unlink($file);
                    }
                }
        }
    }
    /**
     * Return dimensions
     * @return mixed
     */
    protected function getDimensions()
    {
        return ! empty($this->dimensions) ? $this->dimensions : null;
    }
}
