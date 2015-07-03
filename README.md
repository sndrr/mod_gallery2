# mod_gallery2
A Gallery2 module for Ariadne CMS

Use at your own risk!
# Description
This module connects Ariadne to a Gallery 2 to display pictures in an
external image block, to use on your sites in Ariadne.

Use in Ariadne as follows:
1. Define the GALLERY const on line 3 of this file.
2. Add something like this in your template:
    <pinp>
      load(mod_gallery.php);
      gallery::ShowRandomImages(10);
    </pinp>

This will display something like this for 10 images:
    <div class="one-image">
      <a href="http://example.com/gallery/IMG.JPG.html" target="_newWindow">
      <img src="http://example.com/gallery/IMG.JPG" width="150"
       height="150" class="giThumbnail" alt="IMG.JPG"/>
      </a>
    </div>

See the respective functions comments for more info
More info on the Gallery2 external image block can be found on the codex:
+ http://codex.gallery2.org/Gallery2:Modules:imageblock
