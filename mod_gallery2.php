<?php
# Define your own gallery here, straight to main.php
define(GALLERY, 'http://example.com/gallery2/main.php');

    /*******************************************************************
     *
     * @author Sander Ruitenbeek <sander@nukanhetnog.net>
     * @version 0.2, Mar 2012
     *
     * Use at your own risk!
     *
     * Description:
     * This module connects Ariadne to a Gallery 2 to display pictures in an
     * external image block, to use on your sites in Ariadne.
     *
     * Use in Ariadne as follows:
     * 1. Define the GALLERY const on line 3 of this file.
     * 2. Add something like this in your template:
     * <pinp>
     *   load(mod_gallery.php);
     *   gallery::ShowRandomImages(10);
     * </pinp>
     *
     * This will display something like this for 10 images:
     * <div class="one-image">
     *  <a href="http://example.com/gallery/IMG.JPG.html" target="_newWindow">
     *   <img src="http://example.com/gallery/IMG.JPG" width="150"
     *    height="150" class="giThumbnail" alt="IMG.JPG"/>
     *  </a>
     * </div>
     *
     * See the respective functions comments for more info
     *
     * More info on the Gallery2 external image block can be found on the codex:
     * http://codex.gallery2.org/Gallery2:Modules:imageblock
     *
     *
     *******************************************************************/

    class gallery
    {
        /**
        * Show single image
        *
        * @param imageId the gallery item id
        * @return the image to show
        */
        public function ShowSingleImage($imageId)
        {
            $image = null;
            if (is_numeric($imageId))
            {
                $image = @readfile(GALLERY.'?g2_view=imageblock.External&g2_blocks=specificItem&g2_show=none&g2_itemId='.$imageId.'&g2_linkTarget=_newWindow');
            }
            return $image;
        }
        /**
         * Show images from a comma separated values list
         *
         * @param $imageCSV a list of comma separated imageIds (12,34,56)
         */
        public function ShowImages($imageCSV)
        {
            $images = null;
            $ids = split(',',$imageCSV);
            foreach($ids as $id)
            {
                $id=trim($id);
                if (is_numeric($id))
                {
                    $images .= @readfile(GALLERY.'?g2_view=imageblock.External&g2_blocks=specificItem&g2_show=none&g2_itemId='.$id.'&g2_linkTarget=_newWindow');
                }
            }
            return $images;
        }

        /**
         * Show random image(s)
         *
         * number of images to show
         */
        public function ShowRandomImages($number)
        {
            if (is_numeric($number))
            {
                $blocks='randomImage';
                while ($number > 1)
                {
                    $blocks .= '|randomImage';
                    $number--;
                }
                return @readfile(GALLERY.'?g2_view=imageblock.External&g2_blocks='.$blocks. '&g2_show=none&g2_linkTarget=_newWindow');
            }
        }
        /**
         * Show recent image(s)
         *
         * @param type $number number of images to show
         * @return type
         */
        public function ShowRecentImages($number)
        {
            if (is_numeric($number))
            {
                $blocks='recentImage';
                while ($number > 1)
                {
                    $blocks .= '|recentImage';
                    $number--;
                }
                return @readfile(GALLERY.'?g2_view=imageblock.External&g2_blocks='.$blocks. '&g2_show=none&g2_linkTarget=_newWindow');
            }
        }
    }

    class pinp_gallery
    {
        /**
         * Show a single image
         *
         * @param numeric $imageId Gallery imageId of the image to show
         * @return the image to show
         */
        function _ShowSingleImage($imageId)
        {
            return gallery::ShowSingleImage($imageId);
        }

        /**
         * Show multiple images
         *
         * @param $imageCSV a comma separated list of values of the Gallery imageIds of the images to show
         * @return the images to show
         */
        function _ShowImages($imageCSV)
        {
            return gallery::ShowImages($imageCSV);
        }

        /**
         * Show random image(s)
         *
         * @param int $number the number of random images to show
         * @return the random images to show
         */
        function _ShowRandomImages($number = 1)
        {
            return gallery::ShowRandomImages($number);
        }

        /**
         * Show recent image(s)
         *
         * @param int $number the number of recent images to show
         * @return the recent image(s) to show
         */
        function _ShowRecentImages($number = 1)
        {
            return gallery::ShowRecentImages($number);
        }
    }
?>