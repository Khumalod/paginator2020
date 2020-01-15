<?php
/**
 * Created by PhpStorm.
 * User: KhuselaM
 * Date: 2019-03-01
 * Time: 19:52
 */
include('connect.php');
//OBJECT ORIENTED VERSION OF SRA Pagination
class Paginator{
    private $request_url;
    public $per_page;
    /* used to determine the last page, last page will be total_rows / per page e.g 10 rows found / 5
    rows per page = last page = 2 */
    private $total_rows_found = false;
    //the current page number
    public $page =  false;
    private $last_page = "";
    private $pagination_links = "";
    private $rows_found = "";
    private $limit = false;

    public function __construct($rows_found,$per_page=15)
    {
        $this->rows_found = $rows_found;
        $this->total_rows_found = $rows_found;
        $this->page = isset($_GET['page']) ? $_GET['page'] : 1;
        $this->request_url = $this->get_request_path();
        $this->per_page = $per_page;
        $this->last_page = ceil($this->total_rows_found / $this->per_page);
    }

    //=====================================================================
    public function create_next(){
        if ($this->last_page != 1) {

            if ($this->page > 1 && $this->page != $this->last_page) {
                $next = $this->last_page + 1;
                $request_url = $this->get_request_path();

                $this->pagination_links .= "<li class='page-item'><a class = 'cp page-link'  onclick ='paginate(\"$request_url & page=$next\")'>Next</a></li>";
            }
        }
    }
    //=====================================================================
    public function create_previous(){
        if ($this->page > 1) {
            //Show 'Previous' only if page number is greater than 1,
            $previous = $this->page - 1;
            $request_url = $this->get_request_path();
            $this->pagination_links = "<li class='page-item'><a class = 'page-link'  onclick ='paginate(\"$request_url & page =$previous\")'>Previous</a></li>";
        }
    }
    //===============================================================================
    public function create_pagination_links(){

        $request_query_strings = $this->get_query_strings();

        unset($request_query_strings['page']); //removes page from query strings

        for ($j = 1; $j <= $this->last_page; $j++) {

            $request_url = $this->get_request_path()."?".http_build_query($request_query_strings);

            //class: to show link as active or in active
            $active = "";
            if ($this->page == $j) {
                $active = "active";
            }
             $this->pagination_links .= "<li class='page-item $active'><a class = 'page-link'  onclick ='paginate(\"$request_url&page=$j\")'>$j</a></li>";
        }
    }
    //===============================================================================
    public function get_pagination_links(){
        $this->create_previous();
        $this->create_pagination_links();
        $this->create_next();
        return $this->pagination_links;
    }
    //===============================================================================
    public function get_request_path(){

         $request_url = $_SERVER['REQUEST_URI'];

         return parse_url($request_url)['path'];

         return $request_url;
    }
    //===============================================================================
    public function get_request_query_strings(){
        $request_url = $_SERVER['REQUEST_URI'];
        $request_url = parse_url($request_url);

        return isset($request_url['query']) ? $request_url['query'] : "";
    }
    //===============================================================================
    public function get_limit(){
        return $this->limit;
    }
    //===============================================================================
    public function get_page_nu(){
       return $this->page_nu;
    }

    public function get_query_strings(){

        parse_str($_SERVER['QUERY_STRING'],$query_strings);
        return $query_strings;

    }

   }

