<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
class Json extends CI_Controller 
{function getallcategory()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`gse_category`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`gse_category`.`order`";
$elements[1]->sort="1";
$elements[1]->header="Order";
$elements[1]->alias="order";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`gse_category`.`status`";
$elements[2]->sort="1";
$elements[2]->header="Status";
$elements[2]->alias="status";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`gse_category`.`name`";
$elements[3]->sort="1";
$elements[3]->header="Name";
$elements[3]->alias="name";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `gse_category`");
$this->load->view("json",$data);
}
public function getsinglecategory()
{
$id=$this->input->get_post("id");
$data["message"]=$this->category_model->getsinglecategory($id);
$this->load->view("json",$data);
}
function getallsubscribe()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`gse_subscribe`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`gse_subscribe`.`email`";
$elements[1]->sort="1";
$elements[1]->header="Email";
$elements[1]->alias="email";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`gse_subscribe`.`timestamp`";
$elements[2]->sort="1";
$elements[2]->header="Timestamp";
$elements[2]->alias="timestamp";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `gse_subscribe`");
$this->load->view("json",$data);
}
public function getsinglesubscribe()
{
$id=$this->input->get_post("id");
$data["message"]=$this->subscribe_model->getsinglesubscribe($id);
$this->load->view("json",$data);
}
function getalltestimonial()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`gse_testimonial`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`gse_testimonial`.`category`";
$elements[1]->sort="1";
$elements[1]->header="Category";
$elements[1]->alias="category";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`gse_testimonial`.`status`";
$elements[2]->sort="1";
$elements[2]->header="Status";
$elements[2]->alias="status";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`gse_testimonial`.`order`";
$elements[3]->sort="1";
$elements[3]->header="Order";
$elements[3]->alias="order";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`gse_testimonial`.`name`";
$elements[4]->sort="1";
$elements[4]->header="Name";
$elements[4]->alias="name";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`gse_testimonial`.`author`";
$elements[5]->sort="1";
$elements[5]->header="Author";
$elements[5]->alias="author";

$elements=array();
$elements[6]=new stdClass();
$elements[6]->field="`gse_testimonial`.`image`";
$elements[6]->sort="1";
$elements[6]->header="Image";
$elements[6]->alias="image";

$elements=array();
$elements[7]=new stdClass();
$elements[7]->field="`gse_testimonial`.`quote`";
$elements[7]->sort="1";
$elements[7]->header="Quote";
$elements[7]->alias="quote";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `gse_testimonial`");
$this->load->view("json",$data);
}
public function getsingletestimonial()
{
$id=$this->input->get_post("id");
$data["message"]=$this->testimonial_model->getsingletestimonial($id);
$this->load->view("json",$data);
}
function getallgetintouch()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`gse_getintouch`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`gse_getintouch`.`category`";
$elements[1]->sort="1";
$elements[1]->header="Category";
$elements[1]->alias="category";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`gse_getintouch`.`firstname`";
$elements[2]->sort="1";
$elements[2]->header="First Name";
$elements[2]->alias="firstname";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`gse_getintouch`.`lastname`";
$elements[3]->sort="1";
$elements[3]->header="Last Name";
$elements[3]->alias="lastname";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`gse_getintouch`.`email`";
$elements[4]->sort="1";
$elements[4]->header="Email";
$elements[4]->alias="email";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`gse_getintouch`.`phone`";
$elements[5]->sort="1";
$elements[5]->header="Phone";
$elements[5]->alias="phone";

$elements=array();
$elements[6]=new stdClass();
$elements[6]->field="`gse_getintouch`.`timestamp`";
$elements[6]->sort="1";
$elements[6]->header="Timestamp";
$elements[6]->alias="timestamp";

$elements=array();
$elements[7]=new stdClass();
$elements[7]->field="`gse_getintouch`.`comment`";
$elements[7]->sort="1";
$elements[7]->header="Comment";
$elements[7]->alias="comment";

$elements=array();
$elements[8]=new stdClass();
$elements[8]->field="`gse_getintouch`.`enquiryfor`";
$elements[8]->sort="1";
$elements[8]->header="Enquiry For";
$elements[8]->alias="enquiryfor";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `gse_getintouch`");
$this->load->view("json",$data);
}
public function getsinglegetintouch()
{
$id=$this->input->get_post("id");
$data["message"]=$this->getintouch_model->getsinglegetintouch($id);
$this->load->view("json",$data);
}
function getalldiarycategory()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`gse_diarycategory`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`gse_diarycategory`.`order`";
$elements[1]->sort="1";
$elements[1]->header="Order";
$elements[1]->alias="order";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`gse_diarycategory`.`status`";
$elements[2]->sort="1";
$elements[2]->header="Status";
$elements[2]->alias="status";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`gse_diarycategory`.`name`";
$elements[3]->sort="1";
$elements[3]->header="Name";
$elements[3]->alias="name";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `gse_diarycategory`");
$this->load->view("json",$data);
}
public function getsinglediarycategory()
{
$id=$this->input->get_post("id");
$data["message"]=$this->diarycategory_model->getsinglediarycategory($id);
$this->load->view("json",$data);
}
function getalldiarysubcategory()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`gse_diarysubcategory`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`gse_diarysubcategory`.`order`";
$elements[1]->sort="1";
$elements[1]->header="Order";
$elements[1]->alias="order";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`gse_diarysubcategory`.`status`";
$elements[2]->sort="1";
$elements[2]->header="Status";
$elements[2]->alias="status";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`gse_diarysubcategory`.`category`";
$elements[3]->sort="1";
$elements[3]->header="Category";
$elements[3]->alias="category";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`gse_diarysubcategory`.`name`";
$elements[4]->sort="1";
$elements[4]->header="Name";
$elements[4]->alias="name";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `gse_diarysubcategory`");
$this->load->view("json",$data);
}
public function getsinglediarysubcategory()
{
$id=$this->input->get_post("id");
$data["message"]=$this->diarysubcategory_model->getsinglediarysubcategory($id);
$this->load->view("json",$data);
}
function getalldiaryarticle()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`gse_diaryarticle`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`gse_diaryarticle`.`status`";
$elements[1]->sort="1";
$elements[1]->header="Status";
$elements[1]->alias="status";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`gse_diaryarticle`.`category`";
$elements[2]->sort="1";
$elements[2]->header="Category";
$elements[2]->alias="category";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`gse_diaryarticle`.`subcategory`";
$elements[3]->sort="1";
$elements[3]->header="Sub Category";
$elements[3]->alias="subcategory";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`gse_diaryarticle`.`name`";
$elements[4]->sort="1";
$elements[4]->header="Name";
$elements[4]->alias="name";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`gse_diaryarticle`.`image`";
$elements[5]->sort="1";
$elements[5]->header="Image";
$elements[5]->alias="image";

$elements=array();
$elements[6]=new stdClass();
$elements[6]->field="`gse_diaryarticle`.`timestamp`";
$elements[6]->sort="1";
$elements[6]->header="Timestamp";
$elements[6]->alias="timestamp";

$elements=array();
$elements[7]=new stdClass();
$elements[7]->field="`gse_diaryarticle`.`content`";
$elements[7]->sort="1";
$elements[7]->header="Content";
$elements[7]->alias="content";

$elements=array();
$elements[8]=new stdClass();
$elements[8]->field="`gse_diaryarticle`.`date`";
$elements[8]->sort="1";
$elements[8]->header="Date";
$elements[8]->alias="date";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `gse_diaryarticle`");
$this->load->view("json",$data);
}
public function getsinglediaryarticle()
{
$id=$this->input->get_post("id");
$data["message"]=$this->diaryarticle_model->getsinglediaryarticle($id);
$this->load->view("json",$data);
}
 
} ?>