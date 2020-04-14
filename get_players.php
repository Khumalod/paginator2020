<?php
//STEP 1 : include paginator class
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
    $search_condition = "";

    if(isset( $_GET['first_position']) || isset( $_GET['second_position'])){
        $first_choice_position = $_GET['first_position'];
        $second_choice_position = $_GET['second_position'];
        $search_condition = "where pre_first_choice_position = '$first_choice_position' or pre_second_choice_position = '$second_choice_position'";
    }

    //STEP 2 : Run your sql select statement
    $sql = "SELECT * FROM $table $search_condition";

    $db_conn_obj = new DbConnection();
    $conn = $db_conn_obj->getdbconnect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    //STEP 3: Count the Number of results return by your sql select statement
    $rows_found =  count($stmt->fetchAll());
    $per_page = 3;

    //STEP 4: Create a new instance of the paginator class, and pass $rows return by your query and
    // number of results to display per_page as params
    $paginator = new Paginator($rows_found,$per_page);

    //STEP 5: get offset and the limit, pass it to your sql statement.
    $offset_and_limimt = 'LIMIT ' . $paginator->get_offset_and_limit();
    $sql = "SELECT pre_firstname,pre_lastname,pre_first_choice_position,pre_second_choice_position FROM $table $search_condition $offset_and_limimt ";

    $db_conn_obj = new DbConnection();
    $conn = $db_conn_obj->getdbconnect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    //SETP 6:
        //GET YOUR DATA and pagination links
    $players =  $stmt->fetchAll();
     //Pagination links
    $pagination_links =  $paginator->get_pagination_links();
    //DONE


    //var_dump($players);
   // die();




$paginatorType ='';

    if($paginatorType == 'ajax'){
        $players_html = "";
        foreach($players as $player){
            $position_nr = $player['pre_first_choice_position'];
            if($player['pre_first_choice_position'] != $first_choice_position){
                $position_nr = $player['pre_second_choice_position'];
            }
            $position_name = $playing_positions_arr[$position_nr];
            $players_html .=  '<li>
                        <a href="#" class="user-avatar">
                            <img src="assets/images/avatars/1.jpg" width="80" alt="Profile of Adeline Yong">
                        </a>
                        <p>
                            <a href="">'.utf8_encode($player['pre_firstname']).'</a>
                            <span>Position : <i>'.$position_name.'</i></span>
                        </p>

                        <a class="delete" href="#"><i class="fa fa-close"></i></a>
                    </li>';
        }


       $arr = ["user_profile"=>$players_html,"pagination_links"=>$pagination_links];
       echo json_encode($arr);

   }


?>
