<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url_helper');
		$this->load->helper(array('form', 'url'));
		$this->load->database();
		$this->load->dbforge();
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('dist/index');
	}

	public function getAllBlogs()
	{
		$data=array(
				array('id' => 1,'title' => 1, 'link' => 2, 'author' => 3, 'tag' => 4),
				array('id' => 2,'title' => 1, 'link' => 2, 'author' => 3, 'tag' => 4),
				array('id' => 3,'title' => 1, 'link' => 2, 'author' => 3, 'tag' => 4),
		);
		header('Content-Type:application/json');

		echo json_encode($data);
	}


	public function getBookData($sid,$zid,$type=''){
		$query = $this->db->query('SELECT * FROM chapter_'.$sid.' WHERE cid ='.$zid);
		$row = $query->row_array();
		if(!$row){
			if($type == 'next'){
				$zid = $zid + 1;
				getBookData($sid,$zid);
			}else{
				$zid = $zid - 1;
				getBookData($sid,$zid);
			}
		}
		$query1 = $this->db->query('SELECT * FROM content_'.$sid.' where ccid='.$row['cid']);
		$row1 = $query1->row_array();
		$query2 = $this->db->query('SELECT * FROM chapter_title_'.$sid.' where chapter_id='.$row['chapter_id']);
		if($row2 = $query2->row_array()){
			$juan = $row2['name'];
		}else{
			$juan='';
		}

		if($type != ''){
			$data=array(
					'id' => $row['cid'],
					'title' => $row['title'],
					'body' => $row1['content'],
					'juan' => $juan
			);
		}else{
			$data[]=array(
					'id' => $row['cid'],
					'title' => $row['title'],
					'body' => $row1['content'],
					'juan' => $juan
			);
		}

		return $data;
	}
	//获取文章   sid=书号   zid=章节id
	public function getBook($sid=0,$zid=0)
	{

		$data=array();

//		var_dump($id);
		$type = $this->input->post('type', TRUE);
		$zid_post = $this->input->post('zid', TRUE);
		$sid_post = $this->input->post('sid', TRUE);

		$query = $this->db->query('SELECT * FROM chapter_'.($sid ? $sid : $sid_post));

		foreach ($query->result_array() as $row)
		{
			$data['booklist'][]=array(
					'id' => $row['cid'],
					'title' => $row['title'],
					'sid' => $sid,
			);
		}

		header('Content-Type:application/json');

		if($type == 'next'){
			$zid_post = $zid_post + 1;
			$data = $this -> getBookData($sid_post,$zid_post,$type);
			echo json_encode($data);
		}else if($type == 'previous'){
			$zid_post = $zid_post - 1;
			$data = $this -> getBookData($sid_post,$zid_post,$type);
			echo json_encode($data);
		}else{
			//从第zip章开始加载
			if($zid){
				$data['book'] = $this -> getBookData($sid,$zid);
				echo json_encode($data);
			}else{
				$query = $this->db->query('SELECT * FROM chapter_'.$sid.' LIMIT 2');

				foreach ($query->result_array() as $row)
				{
					$query1 = $this->db->query('SELECT * FROM content_'.$sid.' where ccid='.$row['cid']);
					$row1 = $query1->row_array();
					$query2 = $this->db->query('SELECT * FROM chapter_title_'.$sid.' where chapter_id='.$row['chapter_id']);
					if($row2 = $query2->row_array()){
						$juan = $row2['name'];
					}else{
						$juan='';
					}

					$data['book'][]=array(
							'id' => $row['cid'],
							'title' => $row['title'],
							'body' => $row1['content'],
							'juan' => $juan
					);
				}
				//默认从第一章
				//var_dump($query);
				echo json_encode($data);
			}
		}
	}

	//txt小说存数据库
	public function saveBook(){
		//txt路径
		$file = FCPATH.'book_txt/qingyunian.txt';
		//var_dump($file);
###判断该文件是否存在
		if(file_exists($file)){
/*
 * --------------------------------尝试1 txt读取为数组————————————————————————————
 * */
			$file_arr = file($file); ###得到数组
			$arr_new = array();

####对数组的处理
//			foreach($file_arr as $v){
//				$a = trim($v);
//				$a = str_replace("\r\n","",$a);
//				$a = str_replace("\r","",$a);
//				$a = str_replace("\n","",$a);
//				$arr_new[] = $a;
//			}
//			//$curl_res = mb_convert_encoding($curl_res, 'utf-8', 'gbk');
//
//			$book = array();
//			$book['zuozhe'] = '';//作者
//			$book['jianjie'] = '';//简介
//			$book['body'] = array();//正文
//			$kaishi = 0;
//			$jieshu = 0;
//			//是否有卷
//			$juan = false;
//			foreach($arr_new as $k => $v){
//				if( $book['zuozhe'] == '' and  strpos($v,'作者：') !== FALSE){
//					$book['zuozhe'] = str_replace("作者：","",$v);
//				}
//
//				if( strpos($v,'内容简介') !== FALSE ){
//					$kaishi = $k;
//				}
//				if( strpos($v,'第一卷') !== FALSE ){
//					$juan = true;
//				}
//				if( strpos($v,'第一章') !== FALSE or strpos($v,'第一卷') !== FALSE ){
//					$jieshu = $k;
//					for($i = $kaishi+1;$i < $jieshu;$i++){
//						$book['jianjie'] .= $arr_new[$i];
//					}
//					break;
//				}
//			}
//			if($juan){
//				foreach($arr_new as $k => $v){
//					if( strpos($v,'第') !== FALSE and strpos($v,'卷') !== FALSE and strlen($v) < 60 and strpos($v,'终') == FALSE and  strpos($v,'章') == FALSE){
//						array_push($book['body'],$v);
//					}
//				}
//				foreach($book['body'] as $k => $v){
//
////					foreach($arr_new as $k1 => $v1){
////						if( strpos($v1,$v) !== FALSE){
////							$kaishi = $k1;
////						}
////						echo $kaishi;
////						break;
////						if( strpos($v1,$v) !== FALSE){
////							$jieshu = $k1;
////							for($i = $kaishi+1;$i < $jieshu;$i++){
////								array_push($book[$k],$arr_new[$i]);
////							}
////							break;
////						}
////					}
//				}
//			}

			foreach($file_arr as $v){
				$a = trim($v);
				$a = str_replace("\r\n","",$a);
				$a = str_replace("\r","",$a);
				$a = str_replace("\n","",$a);
				$arr_new[] = $a;
			}
			/*
             * --------------------------------尝试1结束————————————————————————————
             * */

//读取txt 为字符串
			$myfile = fopen($file, "r") or die("Unable to open file!");
			$content = fread($myfile,filesize($file));
			fclose($myfile);

			$content= mb_convert_encoding($content,'UTF-8','GBK');

			$str = "第一卷 在澹州 范慎很困难地撑着上眼皮，看着指头算自己 第二卷 在澹州 到自己唇边的液体，却惊奇地发现自己 第三卷 在澹州 到自己唇边的液体，却惊奇 ";
			//$keywords = preg_split("/[\x{0a}|\x{0d}]+(第[\x{4e00}-\x{9fa5}]+卷)/u", $content, 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
			//存小说
			$book = array();
			//是否有 卷
			$is_juan = strpos($content,'第一卷 ') !== FALSE;
			if($is_juan){
				//按卷分成数组
				$keywords = preg_split("/[\s]+(第[一二三四五六七八九十]+卷[\s]+[\x{4e00}-\x{9fa5}]+)/u", $content, 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
				//得到卷名
				for($i=1;$i < count($keywords); $i+=2){
					$book[]=array($keywords[$i]);
				}
				//得到卷内容 并按 第*章 分成数组
				$j = 0;
				for($i=2;$i < count($keywords); $i+=2){
					$text = preg_split("/[\s]+(楔子[\s]+[\x{4e00}-\x{9fa5}]+|第[一二三四五六七八九十]+章[\s]+[\x{4e00}-\x{9fa5}\p{P}]+)/u", $keywords[$i], 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
					array_push($book[$j],$text );
					$j++;
				}
			}else{
				//没有分卷 则按章分组
				$keywords = preg_split("/[\s]+(楔子[\s]+[\x{4e00}-\x{9fa5}]+|第[一二三四五六七八九十]+章[\s]+[\x{4e00}-\x{9fa5}\p{P}]+)/u", $content, 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
				$book[0][0]='';
				$n=1;
				for($i=1;$i < count($keywords); $i++){
					$book[0][1][]=$keywords[$i];
				}

			}




			$book_head = preg_split("/作者：([\x{4e00}-\x{9fa5}]+)/u", $keywords[0], 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
			//小说名
			$book_head[0] = str_replace("\r\n","",$book_head[0]);
			$book_head[2] = preg_split("/\r\n/", $book_head[2], 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
			//简介
			$jianjie = '';
			foreach($book_head[2] as $v){
				$jianjie .='<p>'.$v.'</p>';
			}




//$str= iconv('GBK','UTF-8',$str);
//或：
//$str= mb_convert_encoding($str,'UTF-8','GBK');

			$query = $this->db->query("SELECT nid,title,info,author FROM novel WHERE title='$book_head[0]'");

			$row = $query->row_array(1);
			//chapter_$nid 章节表字段
			$fields = array(
					'cid' => array(
							'type' => 'INT',
							'constraint' => 5,
							'auto_increment' => TRUE
					),
					'title' => array(
							'type' => 'VARCHAR',
							'constraint' => '100',
							'unique' => TRUE,
					),
					'chapter_id' => array(
							'type' => 'INT',
							'constraint' => 5,
					),
					'ccid' => array(
							'type' => 'INT',
							'constraint' => 5,
					),
					'is_delete' => array(
							'type' => 'tinyint',
							'constraint' => 5,
					),
					'words' => array(
							'type' => 'INT',
							'constraint' => 5,
					)
			);

			if($is_juan){//有卷则执行
				//chapter_title_$nid 卷名表字段
				$fields1 = array(
						'chapter_id' => array(
								'type' => 'INT',
								'constraint' => 5,
								'auto_increment' => TRUE
						),
						'name' => array(
								'type' => 'VARCHAR',
								'constraint' => '100',
								'unique' => TRUE,
						)
				);
			}

			//content_$nid内容表字段
			$fields2 = array(
					'ccid' => array(
							'type' => 'INT',
							'constraint' => 5,
							'auto_increment' => TRUE
					),
					'content' => array(
							'type' => 'text',
							'null' => TRUE,
					)
			);
			$attributes = array('ENGINE' => 'InnoDB');


			if (isset($row)) {
				$nid = $row['nid'];
				$data = array(
						'info' => $jianjie,
						'title' => $book_head[0],
						'author' => $book_head[1],
				);
//					$this->db->update('novel', $data);
				echo $row['title'].'已存在';
			} else {
				/*
                * novel小说表
                * title,名
                * info, 简介
                * author, 作者
                * tid, 分类id
                * tags, 标签
                * img 封面
                * status 状态
                * */
				$sql = "INSERT INTO novel (title, info, author, tid, tags, img, status) VALUES ('$book_head[0]', '$jianjie', '$book_head[1]',15,0,'',1)";
				$this->db->query($sql);
				$nid = $this->db->insert_id();
				if ($this->db->affected_rows()) {

					$this->dbforge->add_field($fields);
					$this->dbforge->add_key('cid', TRUE);
					$chapter = $this->dbforge->create_table('chapter_'.$nid, FALSE, $attributes);

					if($is_juan){
						$this->dbforge->add_field($fields1);
						$this->dbforge->add_key('chapter_id', TRUE);
						$chapter_t = $this->dbforge->create_table('chapter_title_'.$nid, FALSE, $attributes);
					}

					$this->dbforge->add_field($fields2);
					$this->dbforge->add_key('ccid', TRUE);
					$content = $this->dbforge->create_table('content_'.$nid, FALSE, $attributes);
				}
				if($content and ($is_juan?$chapter_t:true) and $chapter){
					//文章信息数组
					$arr_text = array();
					$arr_juan = array();
					$arr_zhang = array();
					$id = 1;
					foreach($book as $k => $v){
						//得到卷目录
						//echo $v[0]."<br>";
						$arr_juan[] = array('name' => $v[0]);

						//得到文章
						for($i=1;$i<count($v[1]);$i+=2){
							//去换行
							$data = preg_split("/\r\n/", $v[1][$i], 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
							//增加<p>
							$data_p = '';
							foreach($data as $v2){
								$data_p .='<p>'.$v2.'</p>';
							}
							$arr_text[]=array('content'=>$data_p);
						}
						//得到章目录
						for($i=0;$i<count($v[1]);$i+=2){
							//echo $v[1][$i]."<br>";
							$arr_zhang[] = array(
									'title' => $v[1][$i],
									'chapter_id' => $k+1,
									'ccid' => $id,
									'is_delete' => 0,
									'words' => mb_strlen($v[1][$i+1], 'UTF-8')
							);
							$id++;
						}
					}

					if($is_juan){
						if($this->db->insert_batch('chapter_title_'.$nid, $arr_juan)){
							echo '卷目录导入成功<br>';
						}
					}

					if($this->db->insert_batch('content_'.$nid, $arr_text)){
						echo '内容导入成功<br>';
					}

					if($this->db->insert_batch('chapter_'.$nid, $arr_zhang)){
						echo '章目录导入成功<br>';
					}
				}
			}


echo "<pre>";


echo "</pre>";

#####接下来就是对数组数据的取出#####

		}else{
			echo "file not exists!";
		}
	}

	public function upload()
	{
		$this->load->view('upload_form', array('error' => ' ' ));
	}

	public function do_upload()
	{
		$config['upload_path']      = './book_txt/';
		$config['allowed_types']    = 'gif|jpg|png|txt';
		$config['max_size']     = 100;
		$config['max_width']        = 1024;
		$config['max_height']       = 768;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile'))
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('upload_success', $data);
		}
	}

}
