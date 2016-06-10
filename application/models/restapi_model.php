<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class restapi_model extends CI_Model
{
    public function getInTouch($firstname, $lastname, $email, $phone,$location,$enquiry,$noofpeople,$comment,$category,$startdate,$enddate)
    {
      // check if mail exist already
      $checkemail=$this->db->query("SELECT * FROM `gse_getintouch` WHERE `email`='$email'");
      if($checkemail->num_rows() > 0)
      {
           $obj->value = false;
           $obj->data = "User already exists";
           return $obj;
      }
      else
      {
          $data=array("category" => $category,"firstname" => $firstname,"lastname" => $lastname,"email" => $email,"phone" => $phone,"comment" => $comment,"enquiryfor" => $enquiry,"location" => $location,"startdate" => $startdate,"enddate" => $enddate);
          $query=$this->db->insert( "gse_getintouch", $data );
          $id=$this->db->insert_id();
          $obj = new stdClass();
         if(!$query)
         {  $obj->value = false;
            $obj->data = "User already exists";
            return $obj;
         }
         else
         {
           $obj->value = true;
           $obj->data = "Successfully registered";
           return $obj;
         }
      }
    }


    public function getMovieDetails()
    {
          $query['description'] = $this->db->query("SELECT `id`, `order`, `status`, `name`, `content` FROM `gse_category` WHERE `status`=1")->row();
          $query['isreleased'] = $this->db->query("SELECT `id`, `name`, `banner`, `releasedate`, `image` FROM `gse_moviedetail` WHERE `isreleased`=1")->result();
          $query['isupcoming'] = $this->db->query("SELECT `id`, `name`, `banner`, `releasedate`, `image` FROM `gse_moviedetail` WHERE `isupcoming`=1")->result();
          $query['moviediaries'] = $this->db->query("SELECT `gse_diaryarticle`.`id`, `gse_diaryarticle`.`status`, `gse_diaryarticle`.`diarycategory`, `gse_diaryarticle`.`diarysubcategory`, `gse_diaryarticle`.`name`, `gse_diaryarticle`.`image`, `gse_diaryarticle`.`timestamp`, `gse_diaryarticle`.`content`, `gse_diaryarticle`.`date`, `gse_diaryarticle`.`type`, `gse_diaryarticle`.`showhide` FROM `gse_diaryarticle`
          LEFT OUTER JOIN `gse_diarycategory` ON `gse_diarycategory`.`id`=`gse_diaryarticle`.`diarycategory`
          WHERE `gse_diarycategory`.`name` LIKE '%movie%' OR `gse_diarycategory`.`name` LIKE '%movies%' ORDER BY `date` DESC LIMIT 3 ")->result();
          $query['testimonial'] = $this->db->query("SELECT * FROM `gse_testimonial` WHERE `category`=1")->result();

          if (!query)
          {
          $obj->value = false;
          $obj->data = "No data found";
          return $obj;
          }
          else
          {
          $obj->value = true;
          $obj->data = $query;
          return $obj;
          }

    }

    public function getWeddingDetails()
    {
          $query['description'] = $this->db->query("SELECT `id`, `order`, `status`, `name`, `content` FROM `gse_category` WHERE `status`=1 AND `id`=2")->row();

          $query['weddingtype'] = $this->db->query("SELECT * FROM `gse_wedding`")->result();

          $query['services'] = $this->db->query("SELECT `id`, `name`, `content`, `type`, `order` FROM `gse_service` WHERE `type`=1 ORDER BY `order`")->result();

          $query['weddingdiaries'] = $this->db->query("SELECT `gse_diaryarticle`.`id`, `gse_diaryarticle`.`status`, `gse_diaryarticle`.`diarycategory`, `gse_diaryarticle`.`diarysubcategory`, `gse_diaryarticle`.`name`, `gse_diaryarticle`.`image`, `gse_diaryarticle`.`timestamp`, `gse_diaryarticle`.`content`, `gse_diaryarticle`.`date`, `gse_diaryarticle`.`type`, `gse_diaryarticle`.`showhide` FROM `gse_diaryarticle`
          LEFT OUTER JOIN `gse_diarycategory` ON `gse_diarycategory`.`id`=`gse_diaryarticle`.`diarycategory`
          WHERE `gse_diarycategory`.`name` LIKE '%movie%' OR `gse_diarycategory`.`name` LIKE '%movies%' ORDER BY `date` DESC LIMIT 3 ")->result();
          $query['testimonial'] = $this->db->query("SELECT * FROM `gse_testimonial` WHERE `category`=2")->result();
          if (!query)
          {
          $obj->value = false;
          $obj->data = "No data found";
          return $obj;
          }
          else
          {
          $obj->value = true;
          $obj->data = $query;
          return $obj;
          }

    }

    public function getMovieInside($id){
      $query['moviedetail']=$this->db->query("SELECT `id`, `isupcoming`, `isreleased`, `name`, `banner`, `imdb`, `producer`, `director`, `cast`, `music`, `synopsis`, `videos`, `releasedate`, `image` FROM `gse_moviedetail` WHERE `id`='$id'")->row();
      $query['wallpaper']=$this->db->query("SELECT `id`, `movie`, `image` FROM `gse_moviewallpaper` WHERE `movie`='$id'")->result();
      $query['imagegallery']=$this->db->query("SELECT `id`, `movie`, `order`, `status`, `image` FROM `gse_moviegallery` WHERE `movie`='$id' AND `status`=1 ORDER BY `order`")->result();
      $query['featuredvideos']=$this->db->query("SELECT `id`, `content`, `movie` FROM `gse_movie` WHERE `movie`='$id'")->result();
      $query['award']=$this->db->query("SELECT `id`, `award`, `awardname`, `awardreceiver`, `winnername`, `movie` FROM `gse_awarddetail` WHERE `movie`='$id'")->result();
      if($query)
      {
        $obj->value = true;
        $obj->data = $query;
        return $obj;
      }
      else
      {
        $obj->value = false;
        $obj->data = "No data found";
        return $obj;
      }

    }


    public function getWeddingInsideDetails($id){
      $query['weddingdetail']=$this->db->query("SELECT `id`, `wedding`, `name`, `image`, `content`, `videos` FROM `gse_weddingsubtype` WHERE `id`='$id'")->row();
      // $query['wallpaper']=$this->db->query("SELECT `id`, `movie`, `image` FROM `gse_moviewallpaper` WHERE `movie`='$id'")->result();
      $query['imagegallery']=$this->db->query("SELECT `id`, `wedding`, `status`, `order`, `image`, `weddingsubtype` FROM `gse_weddinggallery` WHERE `weddingsubtype`=$id AND `status`=1 ORDER BY `order`")->result();
      $query['featuredvideos']=$this->db->query("SELECT `id`, `wedding`, `name`, `image`, `banner`, `weddingsubtype` FROM `gse_weddingtype` WHERE `weddingsubtype`=$id")->result();
      $wedding = $this->db->query("SELECT `wedding` FROM `gse_weddingsubtype` WHERE `id`='$id'")->row();
      $query['relatedarticles'] = $this->db->query("SELECT `id`, `wedding`, `name`, `image`, `content`, `videos` FROM `gse_weddingsubtype` WHERE `wedding` = $wedding->wedding AND `id` !='$id' ORDER BY `id` DESC LIMIT 0,3")->result();
      if($query)
      {
        $obj->value = true;
        $obj->data = $query;
        return $obj;
      }
      else
      {
        $obj->value = false;
        $obj->data = "No data found";
        return $obj;
      }

    }

    public function getWeddingInsideBanner($id){
      $query=$this->db->query("SELECT `id`, `name`, `image`, `banner` FROM `gse_wedding` WHERE `id`='$id'")->row();
      if($query)
      {
        $obj->value = true;
        $obj->data = $query;
        return $obj;
      }
      else
      {
        $obj->value = false;
        $obj->data = "No data found";
        return $obj;
      }

    }

    public function getWeddingImagesVideos($id){
      $query['Images']=$this->db->query("SELECT `id`, `wedding`, `status`, `order`, `image`, `weddingsubtype` FROM `gse_weddinggallery` WHERE `weddingsubtype`='$id' AND `status`=1 ORDER BY `order` ASC")->result();
      $query['Videos']=$this->db->query("SELECT `name` as `url` FROM `gse_weddingtype` WHERE `weddingsubtype`='$id'")->result();
      if($query)
      {
        $obj->value = true;
        $obj->data = $query;
        return $obj;
      }
      else
      {
        $obj->value = false;
        $obj->data = "No data found";
        return $obj;
      }

    }

    public function getEvents()
    {
      $query['description'] = $this->db->query("SELECT `id`, `order`, `status`, `name`, `content` FROM `gse_category` WHERE `status`=1 AND `id`=4")->row();

      $query['events'] = $this->db->query("SELECT * FROM `gse_event`")->result();

      $query['services'] = $this->db->query("SELECT `id`, `name`, `content`, `type`, `order` FROM `gse_service` WHERE `type`=3 ORDER BY `order`")->result();

      $query['eventdiaries'] = $this->db->query("SELECT `gse_diaryarticle`.`id`, `gse_diaryarticle`.`status`, `gse_diaryarticle`.`diarycategory`, `gse_diaryarticle`.`diarysubcategory`, `gse_diaryarticle`.`name`, `gse_diaryarticle`.`image`, `gse_diaryarticle`.`timestamp`, `gse_diaryarticle`.`content`, `gse_diaryarticle`.`date`, `gse_diaryarticle`.`type`, `gse_diaryarticle`.`showhide` FROM `gse_diaryarticle`
      LEFT OUTER JOIN `gse_diarycategory` ON `gse_diarycategory`.`id`=`gse_diaryarticle`.`diarycategory`
      WHERE `gse_diarycategory`.`name` LIKE '%event%' OR `gse_diarycategory`.`name` LIKE '%events%' ORDER BY `date` DESC LIMIT 3 ")->result();
      $query['testimonial'] = $this->db->query("SELECT * FROM `gse_testimonial` WHERE `category`=4")->result();
      if (!query)
      {
      $obj->value = false;
      $obj->data = "No data found";
      return $obj;
      }
      else
      {
      $obj->value = true;
      $obj->data = $query;
      return $obj;
      }
    }


    public function getEventInsideBanner($id){
      $query=$this->db->query("SELECT `id`, `name`, `image`, `banner` FROM `gse_event` WHERE `id`='$id'")->row();
      if($query)
      {
        $obj->value = true;
        $obj->data = $query;
        return $obj;
      }
      else
      {
        $obj->value = false;
        $obj->data = "No data found";
        return $obj;
      }
    }

    public function getEventInsideDetails($id){
      $query['eventdetail']=$this->db->query("SELECT `id`, `event`, `name`, `image`, `content`, `order`, `status`, `date`, `location`,`banner` FROM `gse_eventsubtype` WHERE `id`='$id'")->row();
      $query['imagegallery']=$this->db->query("SELECT `id`, `event`, `status`, `order`, `image`, `eventsubtype` FROM `gse_eventgallery` WHERE `eventsubtype`=$id AND `status`=1 ORDER BY `order`")->result();
      $query['featuredvideos']=$this->db->query("SELECT `id`, `event`, `status`, `order`, `url`, `eventsubtype` FROM `gse_eventvideos` WHERE `eventsubtype`=$id")->result();
      $event = $this->db->query("SELECT `event` FROM `gse_eventsubtype` WHERE `id`='$id'")->row();
      if(empty($event))
      {
        $query['relatedarticles'] =[];
      }
      else
      {
        $query['relatedarticles'] = $this->db->query("SELECT `id`, `event`, `name`, `image`, `content`, `order`, `status`, `date`, `location` FROM `gse_eventsubtype` WHERE `event` = $event->event AND `id` !='$id' ORDER BY `id` DESC LIMIT 0,3")->result();
      }

      if($query)
      {
        $obj->value = true;
        $obj->data = $query;
        return $obj;
      }
      else
      {
        $obj->value = false;
        $obj->data = "No data found";
        return $obj;
      }
    }

    public function getMices()
    {
      $query['description'] = $this->db->query("SELECT `id`, `order`, `status`, `name`, `content` FROM `gse_category` WHERE `status`=1 AND `id`=6")->row();

      $query['mice'] = $this->db->query("SELECT * FROM `gse_mice`")->result();

      $query['services'] = $this->db->query("SELECT `id`, `name`, `content`, `type`, `order` FROM `gse_service` WHERE `type`=5 ORDER BY `order`")->result();

      $query['micediaries'] = $this->db->query("SELECT `gse_diaryarticle`.`id`, `gse_diaryarticle`.`status`, `gse_diaryarticle`.`diarycategory`, `gse_diaryarticle`.`diarysubcategory`, `gse_diaryarticle`.`name`, `gse_diaryarticle`.`image`, `gse_diaryarticle`.`timestamp`, `gse_diaryarticle`.`content`, `gse_diaryarticle`.`date`, `gse_diaryarticle`.`type`, `gse_diaryarticle`.`showhide` FROM `gse_diaryarticle`
      LEFT OUTER JOIN `gse_diarycategory` ON `gse_diarycategory`.`id`=`gse_diaryarticle`.`diarycategory`
      WHERE `gse_diarycategory`.`name` LIKE '%mice%' OR `gse_diarycategory`.`name` LIKE '%mices%' ORDER BY `date` DESC LIMIT 3 ")->result();
      $query['testimonial'] = $this->db->query("SELECT * FROM `gse_testimonial` WHERE `category`=6")->result();
      if (!query)
      {
      $obj->value = false;
      $obj->data = "No data found";
      return $obj;
      }
      else
      {
      $obj->value = true;
      $obj->data = $query;
      return $obj;
      }
    }
    public function getMiceInsideBanner($id){
      $query=$this->db->query("SELECT `id`, `name`, `image`, `banner` FROM `gse_mice` WHERE `id`='$id'")->row();
      if($query)
      {
        $obj->value = true;
        $obj->data = $query;
        return $obj;
      }
      else
      {
        $obj->value = false;
        $obj->data = "No data found";
        return $obj;
      }
    }

    public function getMiceInsideDetails($id){
      $query['micedetail']=$this->db->query("SELECT `id`, `mice`, `order`, `name`, `image`, `url`, `banner`, `content` FROM `gse_micesubtype` WHERE `id`='$id'")->row();
      $query['imagegallery']=$this->db->query("SELECT `id`, `mice`, `status`, `order`, `image`, `micesubtype` FROM `gse_micegallery` WHERE `micesubtype`=$id AND `status`=1 ORDER BY `order`")->result();
      $query['featuredvideos']=$this->db->query("SELECT `id`, `mice`, `status`, `order`, `url`, `micesubtype` FROM `gse_micevideos` WHERE `micesubtype`=$id")->result();
      $mice = $this->db->query("SELECT `mice` FROM `gse_micesubtype` WHERE `id`='$id'")->row();
      // print_r($mice);
      if(empty($mice))
      {
        $query['relatedarticles'] = [];
      }
      else
      {
          $query['relatedarticles'] = $this->db->query("SELECT `id`, `mice`, `order`, `name`, `image`, `url`, `banner`, `content` FROM `gse_micesubtype` WHERE `mice` = $mice->mice AND `id` !='$id' ORDER BY `id` DESC LIMIT 0,3")->result();
      }

      if($query)
      {
        $obj->value = true;
        $obj->data = $query;
        return $obj;
      }
      else
      {
        $obj->value = false;
        $obj->data = "No data found";
        return $obj;
      }
    }

    public function getWorldTour()
    {
      $query['description'] = $this->db->query("SELECT `id`, `order`, `status`, `name`, `content` FROM `gse_category` WHERE `status`=1 AND `id`=7")->row();

      $query['worldtourpast'] = $this->db->query("SELECT * FROM `gse_worldtour` WHERE `type`=1")->result();
      $query['worldtourupcoming'] = $this->db->query("SELECT * FROM `gse_worldtour` WHERE `type`=2")->result();

      $query['services'] = $this->db->query("SELECT `id`, `name`, `content`, `type`, `order` FROM `gse_service` WHERE `type`=6 ORDER BY `order`")->result();
      $query['testimonial'] = $this->db->query("SELECT `id`, `category`, `status`, `order`, `name`, `author`, `image`, `quote` FROM `gse_testimonial` WHERE `category`=7")->result();

      $query['worldtourdiaries'] = $this->db->query("SELECT `gse_diaryarticle`.`id`, `gse_diaryarticle`.`status`, `gse_diaryarticle`.`diarycategory`, `gse_diaryarticle`.`diarysubcategory`, `gse_diaryarticle`.`name`, `gse_diaryarticle`.`image`, `gse_diaryarticle`.`timestamp`, `gse_diaryarticle`.`content`, `gse_diaryarticle`.`date`, `gse_diaryarticle`.`type`, `gse_diaryarticle`.`showhide` FROM `gse_diaryarticle`
      LEFT OUTER JOIN `gse_diarycategory` ON `gse_diarycategory`.`id`=`gse_diaryarticle`.`diarycategory`
      WHERE `gse_diarycategory`.`name` LIKE '%world tour%' OR `gse_diarycategory`.`name` LIKE '%worldtour%' ORDER BY `date` DESC LIMIT 3 ")->result();
      if (!query)
      {
      $obj->value = false;
      $obj->data = "No data found";
      return $obj;
      }
      else
      {
      $obj->value = true;
      $obj->data = $query;
      return $obj;
      }
    }

    public function getMediaCorner(){
// $where = " WHERE 1";
// if(!empty($year))
// {
//   $where = "WHERE year(date)='$year'";
// }
 $query['years']= $this->db->query("SELECT DISTINCT year(date) AS 'year' FROM `gse_mediacorner`")->result();
      $query['description'] = $this->db->query("SELECT `id`, `order`, `status`, `name`, `content` FROM `gse_category` WHERE `status`=1 AND `id`=9")->row();

      if($query)
      {
        $obj->value = true;
        $obj->data = $query;
        return $obj;
      }
      else
      {
        $obj->value = false;
        $obj->data = "No data found";
        return $obj;
      }
    }
    public function getSport(){
      $query['description'] = $this->db->query("SELECT `id`, `order`, `status`, `name`, `content` FROM `gse_category` WHERE `status`=1 AND `id`=3")->row();
      $query['sports']=$this->db->query("SELECT `id`, `order`, `status`, `name`, `image`, `link`, `banner`, `content` FROM `gse_sportscategory` WHERE 1")->result();
      $query['services'] = $this->db->query("SELECT `id`, `name`, `content`, `type`, `order` FROM `gse_service` WHERE `type`=2 ORDER BY `order`")->result();

      $query['sportdiaries'] = $this->db->query("SELECT `gse_diaryarticle`.`id`, `gse_diaryarticle`.`status`, `gse_diaryarticle`.`diarycategory`, `gse_diaryarticle`.`diarysubcategory`, `gse_diaryarticle`.`name`, `gse_diaryarticle`.`image`, `gse_diaryarticle`.`timestamp`, `gse_diaryarticle`.`content`, `gse_diaryarticle`.`date`, `gse_diaryarticle`.`type`, `gse_diaryarticle`.`showhide` FROM `gse_diaryarticle`
      LEFT OUTER JOIN `gse_diarycategory` ON `gse_diarycategory`.`id`=`gse_diaryarticle`.`diarycategory`
      WHERE `gse_diarycategory`.`name` LIKE '%sport%' OR `gse_diarycategory`.`name` LIKE '%sports%' ORDER BY `date` DESC LIMIT 3 ")->result();
      $query['testimonial'] = $this->db->query("SELECT * FROM `gse_testimonial` WHERE `category`=3")->result();
      if($query)
      {
        $obj->value = true;
        $obj->data = $query;
        return $obj;
      }
      else
      {
        $obj->value = false;
        $obj->data = "No data found";
        return $obj;
      }
    }

    public function getSportsDetail($id){
      $query['description'] = $this->db->query("SELECT `id`, `order`, `status`, `name`, `image`, `link`, `banner`, `content` FROM `gse_sportscategory` WHERE `id`=$id")->row();

      $query['testimonial'] = $this->db->query("SELECT * FROM `gse_testimonial` WHERE `category`=15")->result();
      if($query)
      {
        $obj->value = true;
        $obj->data = $query;
        return $obj;
      }
      else
      {
        $obj->value = false;
        $obj->data = "No data found";
        return $obj;
      }
    }
    public function getasfcSportsDetail($id){
      $query['description'] = $this->db->query("SELECT `id`, `order`, `status`, `name`, `image`, `link`, `banner`, `content` FROM `gse_sportscategory` WHERE `id`=$id")->row();
      $cdate = date("Y-m-d");
      $query['playerlist'] = $this->db->query("SELECT `id`, `order`, `status`, `sportscategory`, `name`, `image` FROM `gse_player`  WHERE `sportscategory`=$id")->result();
      $query['upcomingmatch'] = $this->db->query("SELECT `id`, `sportscategory`, `name`, `image`, `link`, `location`, `content`, `videos`, `date` FROM `gse_highlight` WHERE date > '$cdate' AND `sportscategory`=$id ")->result();
      $query['testimonial'] = $this->db->query("SELECT * FROM `gse_testimonial` WHERE`category`=16")->result();
      if($query)
      {
        $obj->value = true;
        $obj->data = $query;
        return $obj;
      }
      else
      {
        $obj->value = false;
        $obj->data = "No data found";
        return $obj;
      }
    }
    public function getpfhSportsDetail($id){
      $query['description'] = $this->db->query("SELECT `id`, `order`, `status`, `name`, `image`, `link`, `banner`, `content` FROM `gse_sportscategory` WHERE `id`=$id")->row();
      // $query['playerlist'] = $this->db->query("SELECT `id`, `order`, `status`, `sportscategory`, `name`, `image` FROM `gse_player`  WHERE `sportscategory`=$id")->result();
      // $query['upcomingmatch'] = $this->db->query("SELECT `id`, `sportscategory`, `name`, `image`, `link`, `location`, `content`, `videos`, `date` FROM `gse_highlight` WHERE date > '$cdate' AND `sportscategory`=$id ")->result();
      $query['testimonial'] = $this->db->query("SELECT * FROM `gse_testimonial` WHERE`category`=17")->result();
      if($query)
      {
        $obj->value = true;
        $obj->data = $query;
        return $obj;
      }
      else
      {
        $obj->value = false;
        $obj->data = "No data found";
        return $obj;
      }
    }
    public function getWorldTourInsideDetails($id){
      $query['worldtourdetail']=$this->db->query("SELECT `id`, `type`, `image`, `name`, `location`, `date`, `venue`, `content`, `banner` FROM `gse_worldtour` WHERE `id`='$id'")->row();
      $query['wallpaper']=$this->db->query("SELECT `id`, `image`, `order`, `worldtour` FROM `gse_worldtourwallpaper` WHERE `worldtour`='$id'")->result();
      $query['imagegallery']=$this->db->query("SELECT `id`, `image`, `order`, `worldtour` FROM `gse_worldtourimage` WHERE `worldtour`='$id' ORDER BY `order` ASC")->result();
      $query['featuredvideos']=$this->db->query("SELECT `id`, `worldtour`, `order`, `url` FROM `gse_worldtourvideos` WHERE `worldtour`='$id' ORDER BY `order` ASC")->result();
      if($query)
      {
        $obj->value = true;
        $obj->data = $query;
        return $obj;
      }
      else
      {
        $obj->value = false;
        $obj->data = "No data found";
        return $obj;
      }

    }

    public function getHome(){
      $query['description'] = $this->db->query("SELECT `id`, `order`, `status`, `name`, `content` FROM `gse_category` WHERE `status`=1 AND `id`=11")->row();
          $query['homediaries'] = $this->db->query("SELECT `gse_diaryarticle`.`id`, `gse_diaryarticle`.`status`, `gse_diaryarticle`.`diarycategory`, `gse_diaryarticle`.`diarysubcategory`, `gse_diaryarticle`.`name`, `gse_diaryarticle`.`image`, `gse_diaryarticle`.`timestamp`, `gse_diaryarticle`.`content`, `gse_diaryarticle`.`date`, `gse_diaryarticle`.`type`, `gse_diaryarticle`.`showhide` FROM `gse_diaryarticle`
      LEFT OUTER JOIN `gse_diarycategory` ON `gse_diarycategory`.`id`=`gse_diaryarticle`.`diarycategory`
      WHERE `gse_diarycategory`.`name` LIKE '%home' ORDER BY `date` DESC LIMIT 3 ")->result();
      $query['testimonial'] = $this->db->query("SELECT * FROM `gse_testimonial` WHERE `category`=11")->result();
      if($query)
      {
        $obj->value = true;
        $obj->data = $query;
        return $obj;
      }
      else
      {
        $obj->value = false;
        $obj->data = "No data found";
        return $obj;
      }
    }

public function subscribeSubmit($email)
{
  if(!empty($email))
  {
    $query1 = $this->db->query("SELECT * FROM `gse_subscribe` WHERE `email`='$email'");
    $num = $query1->num_rows();
    if ($num > 0) {
        $object = new stdClass();
        $object->value = false;
        $object->comment = 'already exists';

        return $object;
    } else {
        $this->db->query("INSERT INTO `gse_subscribe`(`email`) VALUE('$email')");
        $id = $this->db->insert_id();
        $object = new stdClass();
        $object->value = true;

        return $object;
    }
  }
  else
  {
    $object = new stdClass();
    $object->value = false;
    $object->message = "Please Enter Email Id";
    }
    return $object;
}

public function getSportsDetailInside($id){
  $query['sportdetail']=$this->db->query("SELECT `id`, `sportscategory`, `name`, `image`, `link`, `location`, `content`, `videos`, `date`,`banner` FROM `gse_highlight` WHERE `id`='$id'")->row();
  $query['imagegallery']=$this->db->query("SELECT `id`, `order`, `status`, `highlight`, `sportscategory`, `image` FROM `gse_previousgamegallery` WHERE `highlight`=$id AND `status`=1 ORDER BY `order`")->result();
  $query['featuredvideos']=$this->db->query("SELECT `id`, `url`, `order`, `highlight`, `sportscategory` FROM `gse_previousgamevideo` WHERE `highlight`=$id")->result();
  $sport = $this->db->query("SELECT `sportscategory` FROM `gse_highlight` WHERE `id`='$id'")->row();
  // print_r($mice);
  if(empty($sport))
  {
    $query['relatedarticles'] = [];
  }
  else
  {
      $query['relatedarticles'] = $this->db->query("SELECT `id`, `sportscategory`, `name`, `image`, `link`, `location`, `content`, `videos`, `date` FROM `gse_highlight` WHERE `sportscategory` = $sport->sportscategory AND `id` !='$id' ORDER BY `id` DESC LIMIT 0,3")->result();
  }

  if($query)
  {
    $obj->value = true;
    $obj->data = $query;
    return $obj;
  }
  else
  {
    $obj->value = false;
    $obj->data = "No data found";
    return $obj;
  }
}

public function getTalent(){
  $query['description'] = $this->db->query("SELECT `id`, `order`, `status`, `name`, `content` FROM `gse_category` WHERE `status`=1 AND `id`=5")->row();
  $query['talent']=$this->db->query("SELECT `id`, `name`, `image`, `link` FROM `gse_talent` WHERE 1")->result();
  $query['services'] = $this->db->query("SELECT `id`, `name`, `content`, `type`, `order` FROM `gse_service` WHERE `type`=4 ORDER BY `order`")->result();

  $query['talentdiaries'] = $this->db->query("SELECT `gse_diaryarticle`.`id`, `gse_diaryarticle`.`status`, `gse_diaryarticle`.`diarycategory`, `gse_diaryarticle`.`diarysubcategory`, `gse_diaryarticle`.`name`, `gse_diaryarticle`.`image`, `gse_diaryarticle`.`timestamp`, `gse_diaryarticle`.`content`, `gse_diaryarticle`.`date`, `gse_diaryarticle`.`type`, `gse_diaryarticle`.`showhide` FROM `gse_diaryarticle`
  LEFT OUTER JOIN `gse_diarycategory` ON `gse_diarycategory`.`id`=`gse_diaryarticle`.`diarycategory`
  WHERE `gse_diarycategory`.`name` LIKE '%talent%' OR `gse_diarycategory`.`name` LIKE '%talents%' ORDER BY `date` DESC LIMIT 3 ")->result();
  $query['testimonial'] = $this->db->query("SELECT * FROM `gse_testimonial` WHERE `category`=5")->result();
  if($query)
  {
    $obj->value = true;
    $obj->data = $query;
    return $obj;
  }
  else
  {
    $obj->value = false;
    $obj->data = "No data found";
    return $obj;
  }
}

public function getTalentInsideBanner($id){
  $query = $this->db->query("SELECT `id`, `name`, `image`, `link`, `banner` FROM `gse_talent` WHERE `id`=$id")->row();
if($query)
  {
    $obj->value = true;
    $obj->data = $query;
    return $obj;
  }
  else
  {
    $obj->value = false;
    $obj->data = "No data found";
    return $obj;
  }
}

public function getTalentDetailInside($id){
  $query['talentdetail']=$this->db->query("SELECT `id`, `talent`, `order`, `status`, `name`, `image`, `url`, `banner`, `content`, `videos` FROM `gse_talenttype` WHERE `id`='$id'")->row();
  $query['imagegallery']=$this->db->query("SELECT `id`, `order`, `status`, `talenttype`, `talent`, `image` FROM `gse_talenttypegallery` WHERE `talenttype`=$id AND `status`=1 ORDER BY `order`")->result();
  $query['featuredvideos']=$this->db->query("SELECT `id`, `url`, `order`, `talenttype` FROM `gse_talenttypevideo` WHERE `talenttype`=$id")->result();
  $talent = $this->db->query("SELECT `talent` FROM `gse_talenttype` WHERE `id`='$id'")->row();
  // print_r($mice);
  if(empty($talent))
  {
    $query['relatedarticles'] = [];
  }
  else
  {
      $query['relatedarticles'] = $this->db->query("SELECT `id`, `talent`, `order`, `status`, `name`, `image`, `url`, `banner`, `content`, `videos`,`location`,`date` FROM `gse_talenttype` WHERE `talent` = $talent->talent AND `id` !='$id' ORDER BY `id` DESC LIMIT 0,3")->result();
  }

  if($query)
  {
    $obj->value = true;
    $obj->data = $query;
    return $obj;
  }
  else
  {
    $obj->value = false;
    $obj->data = "No data found";
    return $obj;
  }
}

public function getClients(){
  $query['description']=$this->db->query("SELECT `id`, `order`, `status`, `name`, `content` FROM `gse_category` WHERE `status`=1 AND `id`=12")->row();
  $query['logos']= $this->db->query("SELECT `id`, `order`, `status`, `name`, `image` FROM `gse_clientlogo` WHERE 1")->result();

  if($query)
  {
    $obj->value = true;
    $obj->data = $query;
    return $obj;
  }
  else
  {
    $obj->value = false;
    $obj->data = "No data found";
    return $obj;
  }
}
public function careersSubmit($category,$name,$email, $phone,$resume,$address,$suburb,$state,$postcode,$dob,$linkedin,$twitter,$github,$portfolio,$otherwebsite,$type,$salary,$expectedctc){
  if(!empty($email))
  {
    $query=$this->db->query("INSERT INTO `gse_careerform`(`category`, `name`, `email`, `phone`, `resume`, `address`, `suburb`, `state`, `postcode`, `dob`, `linkedin`, `twitter`, `github`, `portfolio`, `otherwebsite`, `type`, `salary`, `expectedctc`) VALUES ('$category','$name','$email', '$phone','$resume','$address','$suburb','$state','$postcode','$dob','$linkedin','$twitter','$github','$portfolio','$otherwebsite','$type','$salary','$expectedctc')");
    if($query)
    {
      $obj->value = true;
      $obj->data = "data saved";
      return $obj;
    }
    else
    {
      $obj->value = false;
      return $obj;
    }
  }
  else {
    $obj->value = false;
    $obj->data = "Plaese enter email";
    return $obj;
  }

}


}
?>
