<?php
require_once 'Files/files_handler.php';

/**
 * It's needed to dome improvements creating thumbnails.
 * @author ssola
 */
class Images extends Model implements Files_Observer {
	private $_scheme = array(
						array (
							"field" => "path",
							"validation" => array (
								"empty" => ""
							)
						)
				);
	private $_validation;
		
	public function __construct() {
		$this->_validation = new Validation();
		parent::__construct('images');
	}
	
	public function getImage ( $id, $size ) {
		global $_config;
		
		if ( empty ( $_config['thumb_sizes'][$size] ) ) {
			$size = "";
		} else {
			$size = "-$size";
		}
		
		if ( $id > 0 ) {
			$image = parent::findByPrimary ( $id );
			if ( $image ) {
				$parts = explode ( ".", $image->path );
				$real_url = $parts[0] . $size . "." . $parts[1];
				$real_url = UPLOAD_URL . $parts[0] . $size . "." . $parts[1];
				$image->url = $real_url;
				return $image;
			}
		}
	}
	
	public function saveImgeFromUrl ( $url, $folder = "generic", $room_id = 0 ) {
		global $_config;
		
		if ( !empty ( $url ) ) {
			$buffer = file_get_contents ( $url );
			if ( !empty ( $buffer ) ) {
				$ext = array_pop ( explode(".", array_pop ( explode ( "/", $url ) ) ) ); # get extension
				$new_img_name = md5(microtime()) . "." . $ext;
				$new_img_path = UPLOAD_PATH . SEPARATOR . $folder;
				
				if ( !is_dir($new_img_path)) {
					mkdir($new_img_path, 0777, true);
				}
				
				$new_img_final_path = $new_img_path . SEPARATOR . $new_img_name;
				$new_img_url = $folder."/".$new_img_name;
				
				if ( !empty ( $new_img_final_path ) ) {
					file_put_contents( $new_img_final_path, $buffer );
					
					list($width, $height, $type, $attributes) = getimagesize($new_img_final_path);
					$image = array ( 
						"path" => $new_img_url,
						"height" => $height,
						"width" => $width,
						"weight" => filesize($new_img_final_path),
						"type" => array_pop ( explode ( ".", $new_img_final_path ) ),
						"room_id" => $room_id
					);
					
					$imgid = $this->save ( $image );
					
					// creamos los thumbs si es necesario
					if ( !empty ( $_config['thumb_sizes'] ) ) {
						foreach ( $_config['thumb_sizes'] as $key => $value ) {
							$this->generateThumb($new_img_final_path, $key, UPLOAD_PATH.SEPARATOR.$folder );		
						}
					}
					
					return $new_img_url;
				}
			}
		}
		
		return null;
	}
	
	public function generateThumb ( $path, $size, $upload_path ) {
		global $_config;
		
		if ( file_exists ( $path ) ) {
			if ( !empty ( $_config['thumb_sizes'][$size] ) ) {
				$thumb = new thumbnail ( $path );
				$thumb->size_width ( $_config['thumb_sizes'][$size][0] );
				$thumb->size_height ( $_config['thumb_sizes'][$size][1] );
				$thumbname = explode ( ".", array_pop( explode ( SEPARATOR, $path ) ) );
				$thumbname = $thumbname[0] ."-".$size.".".$thumbname[1];
				$thumb->save ( $upload_path . SEPARATOR . $thumbname );
			}
		}
	}
	
	public function save( $image ) {
		$this->_validation->setElements($this->_scheme, $image );
		if ( $this->_validation->Validate() ) {
			$image['owner_id'] = get_user_ID();
			return parent::save($image);
		}
		
		return null;
	}
	
	/**
	 * Observer pattern when user upload an image, this is called from
	 * uploader.
	 * @see core/Files/Files_Observer::notify()
	 */
	public function notify($observer, $message, $id) {
		$message['image']['path'] = str_replace("-","",$message['image']['path']);

		if ( $id == "upload_image" ) {
			if ( !empty ( $message ) ) {
				// generate thumbnails
				$this->generateThumb(UPLOAD_PATH."/".$message['image']['path'], "thumb", $message['image']['real_path']);
				$this->generateThumb(UPLOAD_PATH."/".$message['image']['path'], "medium", $message['image']['real_path']);
			}
		} elseif ( $id == "save_image" ) {
			$this->save($message['image']);
		}
	}
}
?>