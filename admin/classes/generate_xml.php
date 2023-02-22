<?
//code by dinhtoan1905@yahoo.co.uk
//generate xml and rss
class rssGenerator_rss
{

  var $rss_version = '2.0';
  var $encoding = '';
  var $returnPath = '';
  var $returnPathImgDescription = '';
  function cData($str)
  {
    return '<![CDATA[ ' . $str . ' ]]>';
  }

  function createFeed($channel)
  {
    $selfUrl = (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on' ? 'http://' : 'https://');
    $selfUrl .= $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
	 $rss = '';
    $rss = '<?xml version="1.0"';
    if (!empty($this->encoding))
    {
      $rss .= ' encoding="' . $this->encoding . '"';
    }
    $rss .= '?>' . chr(13);
    $rss .= '<!-- Generated on ' . date('r') . ' -->' . chr(13);
    $rss .= '<rss version="' . $this->rss_version . '" xmlns:atom="http://www.w3.org/2005/Atom">' . chr(13);
    $rss .= '  <channel>' . chr(13);
	 $rss .= '    <atom:link href="' . ($channel->atomLinkHref ? $channel->atomLinkHref : $selfUrl) . '" rel="self" type="application/rss+xml" />' . chr(13);
    $rss .= '    <title>' . $channel->title . '</title>' . chr(13);
    $rss .= '    <link>' . $channel->link . '</link>' . chr(13);
    $rss .= '    <teaser>' . $channel->teaser . '</teaser>' . chr(13);
    if (!empty($channel->language))
    {
      $rss .= '    <language>' . $channel->language . '</language>' . chr(13);
    }
    if (!empty($channel->copyright))
    {
      $rss .= '    <copyright>' . $channel->copyright . '</copyright>' . chr(13);
    }
    if (!empty($channel->generator))
    {
      $rss .= '    <generator>' . $channel->generator . '</generator>' . chr(13);
    }
	 
    foreach ($channel->items as $item)
    {
      $rss .= '    <item>' . chr(13);
		
		//xữ lý phần tiêu đề
      if (!empty($item->title))
      {
        $rss .= '      <title>' . htmlspecialchars($item->title) . '</title>' . chr(13);
      }
		//xữ lý phần tiêu đề
      if (!empty($item->link))
      {
        $rss .= '      <link>' . htmlspecialchars($item->link) . '</link>' . chr(13);
      }
		//ngày cập nhật
      if (!empty($item->pubDate))
      {
	  	$rss .= '      <pubDate>' . htmlspecialchars($item->pubDate) . '</pubDate>' . chr(13);
      }
		
		//nội dung tóm tắt
      if (!empty($item->description))
      {
        $rss .= '      <description>' . htmlspecialchars($item->description) . '</description>' . chr(13);
      }
      $rss .= '    </item>' . chr(13);
    }
    $rss .= '  </channel>' . "\r";
    $rss .= '</rss>';
	 return $rss;
  }
  
}

//class generate channel
class gennerate_channel
{
	var $atomLinkHref;
	var $title = '';
	var $link;
	var $teaser;
	var $language;
	var $generator;
	var $managingEditor;
	var $webMaster;
}
//class gennerate item
class rssGenerator_item
{

  var $title = '';
  var $category = 0;
  var $recordid = 0;
  var $recordimg = 0;
  var $teaser = '';
  var $link = '';
  var $author = '';
  var $pubDate = '';
  var $description = '';
  var $guid = '';
  var $guid_isPermaLink = true;
  var $source = '';
  var $source_url = '';
  var $enclosure_url = '';
  var $enclosure_length = '0';
  var $enclosure_type = '';
  var $imagePath	=	'';
  var $categories = array();

}

?>