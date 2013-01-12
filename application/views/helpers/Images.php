<?php

/**
 * Description of Images
 *
 * @author Administrador
 */

/**
 * This is based on the code of S. Mohammed Alsharaf, http://www.zfsnippets.com/snippets/view/id/44.
 *
 * I still don't like this code, far too many properties, most of which are being directly accessed,
 * a hardwired path for thumbnails, and a number of other annoyances.
 *
 * For this version of the Image view helper, I reworked it to support an array of configs that you pick from
 * via parameter. You could easily pull the contents of the array from application.ini if you want.
 *
 * It also eliminates the need for paths in the configuration, and should work correctly with your Zend app
 * being run in sub directories.
 *
 * I tried to clean up the code so the various paths to things are all set in the one location, which should
 * make altering it for future development easier.
 *
 * Basic usage is as follows:
 *
 * <?= $this->image('id_name', '/path/to/image.jpg', array('alt' => 'image alt'), 'preset_name'); ?>
 *
 *
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU Public License
 * @author     Cameron Germein (cameron@dhmedia.com.au)
 * @version	   1.1
 */

class Didi_View_Helper_Image extends Zend_View_Helper_Abstract {
	protected $_name;
	protected $_thumb_config;
	protected $_filesystem_path;
	protected $_img_src;
	protected $_thumb_src;
	protected $_full_image_path;
	protected $_file_name;
	protected $_thumb_file_name;
	protected $_image_dir_path;
	protected $_thumb_dir_path;
	protected $_thumbnail; //instance of Image;
	protected $_valid_mime = array ('image/png', 'image/jpeg', 'image/jpg', 'image/gif' );

	public function image($name, $image_path = null, $attribs = array(), $config = 'none') {
		//get details about the thumbnail to generate.
		$this->_thumb_config = $this->_getConfig($config);

		//set path
		$this->_setPaths($image_path);

		//check that the image exists.
	      if (!is_file($this->_filesystem_path . '/' . $this->_full_image_path)) {
			return false;
		}

		//check the image is valid
		$this->_checkImage();

		//set name
		$this->_name = $this->view->escape ( $name );
                 // set name
                //$this->_name = $this->view->escape($name);

		//set attributes
		$this->_setAttributes ( $attribs );

		//generate thumbnail
		$this->_generateThumbnail();

		return $this->_render();
	}
        protected function _setPaths($path) {
		$this->_filesystem_path = $_SERVER['DOCUMENT_ROOT'] . $this->view->baseUrl();
		$this->_full_image_path = $path;

		$parts = pathinfo($path);
		$this->_file_name = $parts['basename'];
		$this->_image_dir_path = $parts['dirname'];
		$this->_thumb_dir_path = $parts['dirname'] . '/thumbs';
		$this->_thumb_file_name = $this->_thumb_config['width'] . 'x' . $this->_thumb_config['height'] . '_' . $this->_file_name;

		$this->_img_src = $this->view->baseUrl () . $this->_image_dir_path . '/' . $this->_file_name;
		$this->_thumb_src = $this->view->baseUrl () . $this->_thumb_dir_path . '/' . $this->_thumb_file_name;
	}
        protected function _checkImage() {
		if (!$img_info = getimagesize($this->_filesystem_path . '/' . $this->_full_image_path)) {
			//throw new Exception('Image is invalid!');
			return false;
		}

		if (!in_array ($img_info['mime'], $this->_valid_mime)) {
			throw new Exception('Image has invalid mime type!');
		}
	}
        protected function _setAttributes($attribs) {
		$alt = '';
		$class = '';
		$map = '';
		$class = '';
		if (isset ( $attribs ['alt'] )) {
			$alt = 'alt="' . $this->view->escape ( $attribs ['alt'] ) . '" ';
		}

		if (isset ( $attribs ['title'] )) {
			$title = 'title="' . $this->view->escape ( $attribs ['title'] ) . '" ';
		} else {
			$title = 'title="' . $this->view->escape ( $attribs ['alt'] ) . '" ';
		}

		if (isset ( $attribs ['map'] )) {
			$map = 'usemap="#' . $this->view->escape ( $attribs ['map'] ) . '" ';
		}

		if (isset ( $attribs ['class'] )) {
			$class = 'class="' . $this->view->escape ( $attribs ['class'] ) . '" ';
		}
		$this->_attribs = $alt . $title . $map . $class;
	}
        protected function _generateThumbnail() {
		$full_thumb_path = $this->_filesystem_path . '/' . $this->_thumb_dir_path . '/' . $this->_thumb_file_name;

		//make sure the thumbnail directory exists.
		if (!file_exists($this->_filesystem_path . '/' . $this->_thumb_dir_path)) {
			if (!mkdir($this->_filesystem_path . '/' . $this->_thumb_dir_path)) {
				throw new Exception ('Cannot create thumbnail directory!');
			};
		}

		//if the thumbnail already exists, don't recreate it.
		if (file_exists ( $full_thumb_path )) {
			$image = new Image();
			$image->open($full_thumb_path);
			$this->_thumbnail = $image;
			return true;
		}

		// resize image
		$image = new Image();
		$image->open($this->_filesystem_path . $this->_full_image_path)
			  ->resize($this->_thumb_config['width'], $this->_thumb_config['height'] )
			  ->save($full_thumb_path, $this->_thumb_config['quality'] );
		$this->_thumbnail = $image;
		return true;
	}
        protected function _render() {
		$xhtml = '<a href="' . $this->_img_src . '">
		  <img width="' . $this->_thumbnail->getWidth() . '" height="' . $this->_thumbnail->getHeight() . '" src="' . $this->_thumb_src . '" ' . $this->_attribs . ' id="' . $this->_name . '"';
                $endTag = ' />';
		if (($this->view instanceof Zend_View_Abstract) && ! $this->view->doctype ()->isXhtml ()) {
			$endTag = '>';
		}
		$xhtml .= $endTag . "</a>";
		return $xhtml;
	}
        protected function _getConfig($config) {
		$configs = array (

                    'none' => array (
				'width' => 100,
				'height' => 100,
				'quality' => 100
			),

                        '300x300' => array (
				'width' => 300,
				'height' => 300,
				'quality' => 100
			),
			'widescreen' => array (
				'width' => 400,
				'height' => 200,
				'quality' => 100
			),
		);
		if (!array_key_exists($config, $configs)) {
			throw new Exception('Config does not exist!');
		}
		return $configs[$config];
	}

}
?>
