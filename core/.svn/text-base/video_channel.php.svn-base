<?php
/**
 * Setting a N number of artists look in YouTube for videoclips,
 * creating a shufflered order playlist with music video. 
 */
class Video_Channel {
	static		$instance;
	private		$artists;
	private		$num_videos;
	private 	$videos = array();
	
	public function __construct() {}
	public function __clone() {}
	
	public function getInstance() {
		if ( !isset ( self::$instance ) ) {
			$class = __CLAS__;
			self::$instance = new $class;
		}
		
		return self::$instance;
	}
	
	/**
	 * Set list of artists, this list will be used to make the video list
	 * @param unknown_type $artists
	 */
	public function setArtists( $artists ) {
		if ( !empty ( $artists ) ) {
			$num_artists = count ( $artists );
			foreach ( $artists as $artist ) {
				$artist->num_videos = ceil ( $this->num_videos / $num_artists );
			}
			
			$this->artists = $artists;
			
			$this->getVideosUrl();
		} else {
			throw new Exception ( _('Please set some artists') );
		}
	}

	/**
	 * Get videos from youtube
	 */
	public function getVideosUrl() {
		if ( $this->artists ) {
			// we need to retrieve videos from this artists
			foreach ( $this->artists as $artist ) {
				$videos = $this->getFromYouTube( $artist->name, $artist->num_videos );
				if ( $videos != null ) {
					foreach ( $videos as $video ) {
						array_push ( $this->videos, $video );
					}
				}
			}
			
			shuffle ( $this->videos );
			
			echo '<pre>';
				print_r ( $this->videos );
			echo '</pre>';
		}
	}
	
	/**
	 * Retrive videos from youtube, from artist assigned
	 * @param unknown_type $artist
	 * @param unknown_type $num
	 */
	private function getFromYouTube( $artist, $num ) {
		if ( !empty ( $artist ) ) {
			$url = str_replace(" ", "+",'http://gdata.youtube.com/feeds/api/videos?alt=jsonc&v=2&q='.$artist.'&orderby=viewCount&setMaxResults='.$num );
			$buffer = file_get_contents ( $url );
			
			if ( !empty ( $buffer ) ) {
				$json = json_decode( $buffer );
				$video_item = array();
				$i = 0;
				foreach ( $json->data->items as $video ) {
					$video_item[$i]['title'] = $video->title;
					$video_item[$i]['video_url'] = $this->youtubeid($video->player->default);
					$video_item[$i]['img_url'] = $video->thumbnail->hqDefault;
					$video_item[$i]['duration'] = $video->duration;
					$i++;
				}
				
				return $video_item;
			}
		}
		
		return null;
	}
	
	/**
	 * Set number to videos to find
	 * @param unknown_type $num
	 */
	public function setNumVideos( $num = 100 ) {
		$num = (int)$num;
		
		if ( $num < 0 ) {
			$num = 100;	
		}
		
		$this->num_videos = $num;
	}

	private function youtubeid($url) {
		$url_parsed = parse_url($url);
		parse_str($url_parsed['query'],$params);
		return $params['v'];
	}
}
?>