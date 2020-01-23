<?php
require('Paginator.php');
require('positions.php');
/**
 * Created by PhpStorm.
 * User: KhuselaM
 * Date: 2019-03-02
 * Time: 17:54
 */



    $table="person_recruitment";
    $first_choice_position = "";
    $second_choice_position = "";
    if(isset( $_GET['fist_position'])){
        $first_choice_position = $_GET['fist_position'];
        $second_choice_position = $_GET['second_position'];
        $search_condition = "where pre_first_choice_position = '$first_choice_position' or pre_second_choice_position = '$second_choice_position'";
    }else{
        $search_condition = "";
    }


    $sql = "SELECT * FROM $table $search_condition";

    $db_conn_obj = new DbConnection();
    $conn = $db_conn_obj->getdbconnect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();


    $rows_found =  count($stmt->fetchAll());


    $paginator = new Paginator($rows_found,'3','normal');
    $pagination_links =  $paginator->get_pagination_links();

    $offset_and_limimt = 'LIMIT ' . ($paginator->page - 1) * $paginator->per_page . ',' . $paginator->per_page;
    $sql = "SELECT * FROM $table $search_condition $offset_and_limimt ";

    $db_conn_obj = new DbConnection();
    $conn = $db_conn_obj->getdbconnect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();


    $person_data =  $stmt->fetchAll();

    $players_html = "";
    foreach($person_data as $person){
        $position_nr = $person['pre_first_choice_position'];
        if($person['pre_first_choice_position'] != $first_choice_position){
            $position_nr = $person['pre_second_choice_position'];
        }
        $position_name = $playing_positions_arr[$position_nr];
        $players_html .=  '<li>
                        <a href="#" class="user-avatar">
                            <img src="assets/images/avatars/1.jpg" width="80" alt="Profile of Adeline Yong">
                        </a>
                        <p>
                            <a href="">'.utf8_encode($person['pre_firstname']).'</a>
                            <span>Position : <i>'.$position_name.'</i></span>
                        </p>

                        <a class="delete" href="#"><i class="fa fa-close"></i></a>
                    </li>';
    }

   //$data =  $html;
  // echo $pagination_links;

   /* $arr = ["user_profile"=>$html,"pagination_links"=>$pagination_links];
   echo json_encode($arr); */

?>
