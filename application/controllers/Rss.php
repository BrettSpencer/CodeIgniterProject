<?php
//Rss.php
class Rss extends CI_Controller {

    public function index()
    {
        

//read-feed-simpleXML.php
//our simplest example of consuming an RSS feed

  //$request = "http://rss.news.yahoo.com/rss/software";
        
      /*  https://www.google.com/search?hl=en&gl=us&tbm=nws&authuser=0&q=arabian+stallion&oq=arabian+stallion&gs_l=news-cc.3..43j43i53.90797.98251.0.98857.18.10.1.7.1.0.64.381.10.10.0...0.0...1ac.1.4cr6h0JMA24
        */
        
    $request = "https://news.google.com/news?pz=1&cf=all&ned=us&hl=en&topic=b&output=rss";
  $response = file_get_contents($request);
  $xml = simplexml_load_string($response);
  print '<h1>' . $xml->channel->title . '</h1>';
  foreach($xml->channel->item as $story)
  {
    echo '<a href="' . $story->link . '">' . $story->title . '</a><br />'; 
    echo '<p>' . $story->description . '</p><br /><br />';
  }

            //$data['news'] = $this->news_model->get_news();
            //$data['title'] = 'News archive';

            //$this->load->view('templates/header', $data);
            //$this->load->view('news/index', $data);
            //$this->load->view('templates/footer');
    }//end index()

    
}//end Rss