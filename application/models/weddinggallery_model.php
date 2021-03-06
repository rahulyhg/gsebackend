<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class weddinggallery_model extends CI_Model
{
public function create($wedding,$status,$order,$image,$weddingsubtype)
{
$data=array("wedding" => $wedding,"status" => $status,"order" => $order,"image" => $image,"weddingsubtype" => $weddingsubtype);
$query=$this->db->insert( "gse_weddinggallery", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("gse_weddinggallery")->row();
return $query;
}
function getsingleweddinggallery($id){
$this->db->where("id",$id);
$query=$this->db->get("gse_weddinggallery")->row();
return $query;
}
public function edit($id,$wedding,$status,$order,$image,$weddingsubtype)
{
if($image=="")
{
$image=$this->weddinggallery_model->getimagebyid($id);
$image=$image->image;
}
$data=array("wedding" => $wedding,"status" => $status,"order" => $order,"image" => $image,"weddingsubtype" => $weddingsubtype);
$this->db->where( "id", $id );
$query=$this->db->update( "gse_weddinggallery", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `gse_weddinggallery` WHERE `id`='$id'");
return $query;
}
public function getimagebyid($id)
{
$query=$this->db->query("SELECT `image` FROM `gse_weddinggallery` WHERE `id`='$id'")->row();
return $query;
}
public function getdropdown()
{
$query=$this->db->query("SELECT * FROM `gse_weddinggallery` ORDER BY `id`
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
