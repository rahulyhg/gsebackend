<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class moviedetail_model extends CI_Model
{
public function create($isupcoming,$isreleased,$name,$banner,$imdb,$producer,$director,$cast,$music,$synopsis,$videos,$releasedate)
{
    $releasedate = new DateTime($releasedate);
        $releasedate = $releasedate->format('Y-m-d');
$data=array("isupcoming" => $isupcoming,"isreleased" => $isreleased,"name" => $name,"banner" => $banner,"imdb" => $imdb,"producer" => $producer,"director" => $director,"cast" => $cast,"music" => $music,"synopsis" => $synopsis,"videos" => $videos,"releasedate" => $releasedate);
$query=$this->db->insert( "gse_moviedetail", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("gse_moviedetail")->row();
return $query;
}
function getsinglemoviedetail($id){
$this->db->where("id",$id);
$query=$this->db->get("gse_moviedetail")->row();
return $query;
}
       public function getisupomingdropdown()
    {
    $return=array(
    "" => "Select",
    "1" => "Yes",
    "2" => "No"
    );
            
    return $return;
    }
public function edit($id,$isupcoming,$isreleased,$name,$banner,$imdb,$producer,$director,$cast,$music,$synopsis,$videos,$releasedate)
{
     $releasedate = new DateTime($releasedate);
        $releasedate = $releasedate->format('Y-m-d');
if($banner=="")
{
$banner=$this->moviedetail_model->getimagebyid($id);
$banner=$banner->banner;
}
$data=array("isupcoming" => $isupcoming,"isreleased" => $isreleased,"name" => $name,"banner" => $banner,"imdb" => $imdb,"producer" => $producer,"director" => $director,"cast" => $cast,"music" => $music,"synopsis" => $synopsis,"videos" => $videos,"releasedate" => $releasedate);
$this->db->where( "id", $id );
$query=$this->db->update( "gse_moviedetail", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `gse_moviedetail` WHERE `id`='$id'");
return $query;
}
public function getimagebyid($id)
{
$query=$this->db->query("SELECT `banner` FROM `gse_moviedetail` WHERE `id`='$id'")->row();
return $query;
}
public function getdropdown()
{
$query=$this->db->query("SELECT * FROM `gse_moviedetail` ORDER BY `id` 
                    ASC")->result();
$return=array(
"" => "Select Option"
);
foreach($query as $row)
{
$return[$row->id]=$row->name;
}
return $return;
}
}
?>