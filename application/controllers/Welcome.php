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

	//获取文章   sid=书号   zid=章节id
	public function getBook($sid=0,$zid=0)
	{

		$data=array(
				array('id'  => 1,'title' => '第一章 入梦', 'body' => "<p>　　残阳西落，橙红色的阳光洒落在启明高中的门口，让每一个经过的学子都仿佛披上了一层赤红的轻纱。</p>
                    <p>　　几个十六七岁的少年凑在一块，一边朝校门走去，一边嘻嘻哈哈地笑闹。</p>
                    <p>　　“我说阿牧，你今天是怎么了，从早上开始就一直打呵欠，上课的时候也一直在睡觉，昨晚干嘛去了？”</p>
                    <p>　　一个微胖的少年注意到身边好友疲惫的模样，诧异地询问道。</p>
                    <p>　　“怕不是通宵看小黄本了？”另一个少年露出猥琐的笑容。</p>
                    <p>　　“哦？什么本子这么精彩？”几个少年眼睛一亮，纷纷起哄，“也借给我看一下啊！”</p>
                    <p>　　杜牧瞥了他们一眼，脸上闪过一丝无奈，微微摇头：“我没看本子。”</p>
                    <p>　　“切，信你才有鬼！”</p><p>　　“就是！”</p><p>　　“不看本子，总不会是通宵复习了吧？”</p>
                    <p>　　几人一路打打闹闹，来到分岔口后才挥手分别，杜牧独自一人拐向左边，走了四五分钟后，脚步一转，步入一条略显脏乱的小巷里。</p>
                 "),
				array('id'  => 2,'title' => '第二章 边朝校门走去', 'body' => "<p>　　残阳西落，橙红色的阳光洒落在启明高中的门口，让每一个经过的学子都仿佛披上了一层赤红的轻纱。</p>
                    <p>　　几个十六七岁的少年凑在一块，一边朝校门走去，一边嘻嘻哈哈地笑闹。</p>
                    <p>　　“我说阿牧，你今天是怎么了，从早上开始就一直打呵欠，上课的时候也一直在睡觉，昨晚干嘛去了？”</p>
                    <p>　　一个微胖的少年注意到身边好友疲惫的模样，诧异地询问道。</p>
                    <p>　　“怕不是通宵看小黄本了？”另一个少年露出猥琐的笑容。</p>
                    <p>　　“哦？什么本子这么精彩？”几个少年眼睛一亮，纷纷起哄，“也借给我看一下啊！”</p>
                    <p>　　杜牧瞥了他们一眼，脸上闪过一丝无奈，微微摇头：“我没看本子。”</p>
                    <p>　　“切，信你才有鬼！”</p><p>　　“就是！”</p><p>　　“不看本子，总不会是通宵复习了吧？”</p>
                    <p>　　几人一路打打闹闹，来到分岔口后才挥手分别，杜牧独自一人拐向左边，走了四五分钟后，脚步一转，步入一条略显脏乱的小巷里。</p>
                 "),
				array('id'  => 3,'title' => '第三章 异地询问道', 'body' => "<p>　　残阳西落，橙红色的阳光洒落在启明高中的门口，让每一个经过的学子都仿佛披上了一层赤红的轻纱。</p>
                    <p>　　几个十六七岁的少年凑在一块，一边朝校门走去，一边嘻嘻哈哈地笑闹。</p>
                    <p>　　“我说阿牧，你今天是怎么了，从早上开始就一直打呵欠，上课的时候也一直在睡觉，昨晚干嘛去了？”</p>
                    <p>　　一个微胖的少年注意到身边好友疲惫的模样，诧异地询问道。</p>
                    <p>　　“怕不是通宵看小黄本了？”另一个少年露出猥琐的笑容。</p>
                    <p>　　“哦？什么本子这么精彩？”几个少年眼睛一亮，纷纷起哄，“也借给我看一下啊！”</p>
                    <p>　　杜牧瞥了他们一眼，脸上闪过一丝无奈，微微摇头：“我没看本子。”</p>
                    <p>　　“切，信你才有鬼！”</p><p>　　“就是！”</p><p>　　“不看本子，总不会是通宵复习了吧？”</p>
                    <p>　　几人一路打打闹闹，来到分岔口后才挥手分别，杜牧独自一人拐向左边，走了四五分钟后，脚步一转，步入一条略显脏乱的小巷里。</p>
                 "),
				array('id'  => 4,'title' => '第四章 宵看小黄', 'body' => "<p>　　残阳西落，橙红色的阳光洒落在启明高中的门口，让每一个经过的学子都仿佛披上了一层赤红的轻纱。</p>
                    <p>　　几个十六七岁的少年凑在一块，一边朝校门走去，一边嘻嘻哈哈地笑闹。</p>
                    <p>　　“我说阿牧，你今天是怎么了，从早上开始就一直打呵欠，上课的时候也一直在睡觉，昨晚干嘛去了？”</p>
                    <p>　　一个微胖的少年注意到身边好友疲惫的模样，诧异地询问道。</p>
                    <p>　　“怕不是通宵看小黄本了？”另一个少年露出猥琐的笑容。</p>
                    <p>　　“哦？什么本子这么精彩？”几个少年眼睛一亮，纷纷起哄，“也借给我看一下啊！”</p>
                    <p>　　杜牧瞥了他们一眼，脸上闪过一丝无奈，微微摇头：“我没看本子。”</p>
                    <p>　　“切，信你才有鬼！”</p><p>　　“就是！”</p><p>　　“不看本子，总不会是通宵复习了吧？”</p>
                    <p>　　几人一路打打闹闹，来到分岔口后才挥手分别，杜牧独自一人拐向左边，走了四五分钟后，脚步一转，步入一条略显脏乱的小巷里。</p>
                 "),
				array('id'  => 5,'title' => '第五章 的少年注意到', 'body' => "<p>　　残阳西落，橙红色的阳光洒落在启明高中的门口，让每一个经过的学子都仿佛披上了一层赤红的轻纱。</p>
                    <p>　　几个十六七岁的少年凑在一块，一边朝校门走去，一边嘻嘻哈哈地笑闹。</p>
                    <p>　　“我说阿牧，你今天是怎么了，从早上开始就一直打呵欠，上课的时候也一直在睡觉，昨晚干嘛去了？”</p>
                    <p>　　一个微胖的少年注意到身边好友疲惫的模样，诧异地询问道。</p>
                    <p>　　“怕不是通宵看小黄本了？”另一个少年露出猥琐的笑容。</p>
                    <p>　　“哦？什么本子这么精彩？”几个少年眼睛一亮，纷纷起哄，“也借给我看一下啊！”</p>
                    <p>　　杜牧瞥了他们一眼，脸上闪过一丝无奈，微微摇头：“我没看本子。”</p>
                    <p>　　“切，信你才有鬼！”</p><p>　　“就是！”</p><p>　　“不看本子，总不会是通宵复习了吧？”</p>
                    <p>　　几人一路打打闹闹，来到分岔口后才挥手分别，杜牧独自一人拐向左边，走了四五分钟后，脚步一转，步入一条略显脏乱的小巷里。</p>
                 "),
				array('id'  => 6,'title' => '第六章 到身边好友疲惫的', 'body' => "<p>　　残阳西落，橙红色的阳光洒落在启明高中的门口，让每一个经过的学子都仿佛披上了一层赤红的轻纱。</p>
                    <p>　　几个十六七岁的少年凑在一块，一边朝校门走去，一边嘻嘻哈哈地笑闹。</p>
                    <p>　　“我说阿牧，你今天是怎么了，从早上开始就一直打呵欠，上课的时候也一直在睡觉，昨晚干嘛去了？”</p>
                    <p>　　一个微胖的少年注意到身边好友疲惫的模样，诧异地询问道。</p>
                    <p>　　“怕不是通宵看小黄本了？”另一个少年露出猥琐的笑容。</p>
                    <p>　　“哦？什么本子这么精彩？”几个少年眼睛一亮，纷纷起哄，“也借给我看一下啊！”</p>
                    <p>　　杜牧瞥了他们一眼，脸上闪过一丝无奈，微微摇头：“我没看本子。”</p>
                    <p>　　“切，信你才有鬼！”</p><p>　　“就是！”</p><p>　　“不看本子，总不会是通宵复习了吧？”</p>
                    <p>　　几人一路打打闹闹，来到分岔口后才挥手分别，杜牧独自一人拐向左边，走了四五分钟后，脚步一转，步入一条略显脏乱的小巷里。</p>
                 "),

		);
		$data1=array(
				array('id'  =>4,'title' => '第四章 凑在一块', 'body' => "<p>　　残阳西落，橙红色的阳光洒落在启明高中的门口，让每一个经过的学子都仿佛披上了一层赤红的轻纱。</p>
                    <p>　　几个十六七岁的少年凑在一块，一边朝校门走去，一边嘻嘻哈哈地笑闹。</p>
                    <p>　　“我说阿牧，你今天是怎么了，从早上开始就一直打呵欠，上课的时候也一直在睡觉，昨晚干嘛去了？”</p>
                    <p>　　一个微胖的少年注意到身边好友疲惫的模样，诧异地询问道。</p>
                    <p>　　“怕不是通宵看小黄本了？”另一个少年露出猥琐的笑容。</p>
                    <p>　　“哦？什么本子这么精彩？”几个少年眼睛一亮，纷纷起哄，“也借给我看一下啊！”</p>
                    <p>　　杜牧瞥了他们一眼，脸上闪过一丝无奈，微微摇头：“我没看本子。”</p>
                    <p>　　“切，信你才有鬼！”</p><p>　　“就是！”</p><p>　　“不看本子，总不会是通宵复习了吧？”</p>
                    <p>　　几人一路打打闹闹，来到分岔口后才挥手分别，杜牧独自一人拐向左边，走了四五分钟后，脚步一转，步入一条略显脏乱的小巷里。</p>
                    <p>　　巷子宽逾两米，相对于明亮宽敞的大街来说，显得有些阴森。</p><p>　　走没几步，杜牧眼角余光便瞥见对面走来三个赤膊纹身，模样轻佻的混混青年。</p>
                    <p>　　他脚下微微一顿，紧跟着又恢复正常，装作若无其事般避到一旁，沿着墙边从三人身旁经过。</p>
                    <p>　　三个混混斜睨了杜牧一眼，见是个背着肩包，衣着寒酸的高中生，撇了撇嘴，扭过头继续笑骂。</p>
                    <p>　　见状，杜牧连忙快走几步，拐过巷口，耳边听着三人渐行渐远的笑声，心中不由一松。</p>
                    <p>　　这片街区坐落在昊光市西北最偏僻的角落，治安一向不是很好，经常有混混和扒手在附近厮混，时不时就有打架斗殴或者抢劫之类的案件发生。</p>
                    <p>　　也不知是不是因为太过偏僻的缘故，就连警察都不愿意多管这片街区的事，哪怕接到报案，大多时候都是应付一下了事。</p>
                    <p>　　拜此所赐，杜牧平日里经过这附近的时候，都很是小心提防，深怕被那些混混缠上。</p>
                    <p>　　说到底他只是个身体还未发育完全的普通高中生，剑术连门都未入，武技更是一窍不通，绝不是精通街架的混混们的对手。</p>
                    <p>　　辗转来到一处破旧的老式公寓前，杜牧神情沉郁地从口袋里掏出钥匙，咔嚓一声打开屋门，闪身进入。</p>
                    <p>　　屋内一片寂静黑暗。</p><p>　　自从相依为命的姐姐前往外市上学后，整个公寓就只剩他一个人住了，显得有些清冷。</p>
                    <p>　　随手将书包扔在客厅的沙发上，杜牧来到厨房，打开壁橱取出一袋面包，就着凉水草草解决了晚餐。</p>
                    <p>　　填饱肚子后，他也不休息，直接在客厅冰凉的地板上盘腿就坐，双手交叉放在腿间，闭上眼睛开始修炼百罗呼吸法。</p>
                    <p>　　自从百年前武道初兴，武技蓬勃发展以来，各种炼体的基础呼吸法诀和吐纳术便层出不穷，让人眼花缭乱，各个武道流派都坚称自己的炼体法诀才是最优良的，直到三十年前武圣百罗横空出世，集合众多炼体法诀，取长补短，去芜存菁创造出了百罗呼吸法后，纷争才告一段落。</p>
                    <p>　　作为亚合联邦有史以来天赋最为卓越，实力公认最强的武圣，百罗集众家之所长创造而出的呼吸法，自然无人敢质疑其权威性，事实上之后的岁月也证明了，百罗呼吸法的效果的确远强于其他基础炼体法诀，十分适合普通人打基础和锻炼体魄。</p>
                    <p>　　也因此，亚合联邦开始大力推广百罗呼吸法，历经三十年的努力，如今这项呼吸法已然成为全民修炼必备的基础炼体法诀，基本上所有高中生都从小修炼。</p>
                    <p>　　杜牧自然不例外。</p><p>　　客厅中央，杜牧盘膝而坐，眼眸紧闭，胸膛以一种奥妙规律的节奏缓慢起伏着，呼吸渐渐变得绵长而又悠远。</p>
                    <p>　　随着时间的流逝，他渐渐感觉到小腹处产生一股微弱的暖流，顺着吐息缓缓流遍四肢百骸，让人有种好像泡在温泉中一样的温暖舒适感。</p>
                    <p>　　可惜这股感觉并没有持续太久。</p><p>　　约莫二十分钟后，暖流消失无踪，杜牧从令人着迷的舒适感中清醒过来，第一时间查看身体的状态，发现并没有明显的改变后，脸上不由浮现一丝沮丧。</p>
                    <p>　　“果然，单靠这呼吸法，要想在四个月内成为武者学徒根本是做梦。”</p>
                    <p>　　百罗呼吸法十分适合普通人强身健体，但也仅此而已，仅凭这一呼吸法就成为武者的人实属凤毛麟角，哪怕是成为武者学徒的都不多见。</p>
                    <p>　　何况和绝大多数普通人一样，杜牧并没有练武的资质，剑术至今还未入门，体魄也仅仅是普通高中生的水平，别说成为武者了，就算是武者学徒，对他来说也是个不小的挑战。</p>
                    <p>　　“武科大学，哪怕只是昊光市本地的武科大，招录学员的最低标准都是武者学徒，不突破这一关，想要上武科大学根本不可能！”</p>
                    <p>　　“眼下已经是高三第二学期，距离大考还有不到三个月，要在这段时间内突破到武者学徒境界......”</p><p>　　杜牧咬牙，心中涌起一股涩然。</p>
                    <p>　　成为武者一直是他的梦想！</p><p>　　在联邦，武者享有尊崇的地位和各式各样的特权，财富名声唾手可得，杜牧不知多少回在睡梦中梦见自己成为了强大的武者，名利双收，一举走上人生巅峰。</p>
                    <p>　　然而梦是美好的，现实却十分残酷，他出身贫寒，和姐姐相依为命，靠着联邦补助金勉强过活，完全是穷小子一个，没有多余的金钱购买药材辅助修炼，习武天资更是平平，想成为武者学徒千难万难。</p>
                    <p>　　唯一称得上优点的也就只有还算不错的文化成绩。</p><p>　　可惜这一点并没有多大用处。</p>
                    <p>　　杜牧对自己的定位很清晰，除非成功考上武科大学，否则他将来充其量也就是一个苦逼上班族的命，那不是他想要的生活。</p>
                    <p>　　在武风盛行的联邦，普通上班族，哪怕是精英白领，地位都不如一个武者学徒。</p><p>　　无奈地摇摇头，杜牧收拾心情，起身练了会学校教授的基础拳式，狠狠出了一身汗，洗完澡后便回到自己的房间，拿出课本开始学习。</p>
                    <p>　　一直到将近深夜，他才放下书本，揉了揉眉心，上床准备睡觉。</p><p>　　“明天还有武道课，要早点睡才行。”</p><p>　　要是还像今天那样无精打采的话，武道课上肯定少不了被老师一通训。</p>
                    <p>　　身体一碰到床铺，杜牧体内倦意立刻如潮水涌来，不多时意识就陷入了黑暗之中。</p><p>　　朦朦胧胧间，他脑海猛地一震，消散的意识瞬间卷土重来，整个人陡地睁开眼睛，起身坐直，入目所见便是一片灰扑扑的诡异迷雾。</p>
                    <p>　　“又做梦了......”</p>"),
				array('id'  => 5,'title' => '第五章 凑在一块', 'body' => "<p>　　残阳西落，橙红色的阳光洒落在启明高中的门口，让每一个经过的学子都仿佛披上了一层赤红的轻纱。</p>
                    <p>　　几个十六七岁的少年凑在一块，一边朝校门走去，一边嘻嘻哈哈地笑闹。</p>
                    <p>　　“我说阿牧，你今天是怎么了，从早上开始就一直打呵欠，上课的时候也一直在睡觉，昨晚干嘛去了？”</p>
                    <p>　　一个微胖的少年注意到身边好友疲惫的模样，诧异地询问道。</p>
                    <p>　　“怕不是通宵看小黄本了？”另一个少年露出猥琐的笑容。</p>
                    <p>　　“哦？什么本子这么精彩？”几个少年眼睛一亮，纷纷起哄，“也借给我看一下啊！”</p>
                    <p>　　杜牧瞥了他们一眼，脸上闪过一丝无奈，微微摇头：“我没看本子。”</p>
                    <p>　　“切，信你才有鬼！”</p><p>　　“就是！”</p><p>　　“不看本子，总不会是通宵复习了吧？”</p>
                    <p>　　几人一路打打闹闹，来到分岔口后才挥手分别，杜牧独自一人拐向左边，走了四五分钟后，脚步一转，步入一条略显脏乱的小巷里。</p>
                    <p>　　巷子宽逾两米，相对于明亮宽敞的大街来说，显得有些阴森。</p><p>　　走没几步，杜牧眼角余光便瞥见对面走来三个赤膊纹身，模样轻佻的混混青年。</p>
                    <p>　　他脚下微微一顿，紧跟着又恢复正常，装作若无其事般避到一旁，沿着墙边从三人身旁经过。</p>
                    <p>　　三个混混斜睨了杜牧一眼，见是个背着肩包，衣着寒酸的高中生，撇了撇嘴，扭过头继续笑骂。</p>
                    <p>　　见状，杜牧连忙快走几步，拐过巷口，耳边听着三人渐行渐远的笑声，心中不由一松。</p>
                    <p>　　这片街区坐落在昊光市西北最偏僻的角落，治安一向不是很好，经常有混混和扒手在附近厮混，时不时就有打架斗殴或者抢劫之类的案件发生。</p>
                    <p>　　也不知是不是因为太过偏僻的缘故，就连警察都不愿意多管这片街区的事，哪怕接到报案，大多时候都是应付一下了事。</p>
                    <p>　　拜此所赐，杜牧平日里经过这附近的时候，都很是小心提防，深怕被那些混混缠上。</p>
                    <p>　　说到底他只是个身体还未发育完全的普通高中生，剑术连门都未入，武技更是一窍不通，绝不是精通街架的混混们的对手。</p>
                    <p>　　辗转来到一处破旧的老式公寓前，杜牧神情沉郁地从口袋里掏出钥匙，咔嚓一声打开屋门，闪身进入。</p>
                    <p>　　屋内一片寂静黑暗。</p><p>　　自从相依为命的姐姐前往外市上学后，整个公寓就只剩他一个人住了，显得有些清冷。</p>
                    <p>　　随手将书包扔在客厅的沙发上，杜牧来到厨房，打开壁橱取出一袋面包，就着凉水草草解决了晚餐。</p>
                    <p>　　填饱肚子后，他也不休息，直接在客厅冰凉的地板上盘腿就坐，双手交叉放在腿间，闭上眼睛开始修炼百罗呼吸法。</p>
                    <p>　　自从百年前武道初兴，武技蓬勃发展以来，各种炼体的基础呼吸法诀和吐纳术便层出不穷，让人眼花缭乱，各个武道流派都坚称自己的炼体法诀才是最优良的，直到三十年前武圣百罗横空出世，集合众多炼体法诀，取长补短，去芜存菁创造出了百罗呼吸法后，纷争才告一段落。</p>
                    <p>　　作为亚合联邦有史以来天赋最为卓越，实力公认最强的武圣，百罗集众家之所长创造而出的呼吸法，自然无人敢质疑其权威性，事实上之后的岁月也证明了，百罗呼吸法的效果的确远强于其他基础炼体法诀，十分适合普通人打基础和锻炼体魄。</p>
                    <p>　　也因此，亚合联邦开始大力推广百罗呼吸法，历经三十年的努力，如今这项呼吸法已然成为全民修炼必备的基础炼体法诀，基本上所有高中生都从小修炼。</p>
                    <p>　　杜牧自然不例外。</p><p>　　客厅中央，杜牧盘膝而坐，眼眸紧闭，胸膛以一种奥妙规律的节奏缓慢起伏着，呼吸渐渐变得绵长而又悠远。</p>
                    <p>　　随着时间的流逝，他渐渐感觉到小腹处产生一股微弱的暖流，顺着吐息缓缓流遍四肢百骸，让人有种好像泡在温泉中一样的温暖舒适感。</p>
                    <p>　　可惜这股感觉并没有持续太久。</p><p>　　约莫二十分钟后，暖流消失无踪，杜牧从令人着迷的舒适感中清醒过来，第一时间查看身体的状态，发现并没有明显的改变后，脸上不由浮现一丝沮丧。</p>
                    <p>　　“果然，单靠这呼吸法，要想在四个月内成为武者学徒根本是做梦。”</p>
                    <p>　　百罗呼吸法十分适合普通人强身健体，但也仅此而已，仅凭这一呼吸法就成为武者的人实属凤毛麟角，哪怕是成为武者学徒的都不多见。</p>
                    <p>　　何况和绝大多数普通人一样，杜牧并没有练武的资质，剑术至今还未入门，体魄也仅仅是普通高中生的水平，别说成为武者了，就算是武者学徒，对他来说也是个不小的挑战。</p>
                    <p>　　“武科大学，哪怕只是昊光市本地的武科大，招录学员的最低标准都是武者学徒，不突破这一关，想要上武科大学根本不可能！”</p>
                    <p>　　“眼下已经是高三第二学期，距离大考还有不到三个月，要在这段时间内突破到武者学徒境界......”</p><p>　　杜牧咬牙，心中涌起一股涩然。</p>
                    <p>　　成为武者一直是他的梦想！</p><p>　　在联邦，武者享有尊崇的地位和各式各样的特权，财富名声唾手可得，杜牧不知多少回在睡梦中梦见自己成为了强大的武者，名利双收，一举走上人生巅峰。</p>
                    <p>　　然而梦是美好的，现实却十分残酷，他出身贫寒，和姐姐相依为命，靠着联邦补助金勉强过活，完全是穷小子一个，没有多余的金钱购买药材辅助修炼，习武天资更是平平，想成为武者学徒千难万难。</p>
                    <p>　　唯一称得上优点的也就只有还算不错的文化成绩。</p><p>　　可惜这一点并没有多大用处。</p>
                    <p>　　杜牧对自己的定位很清晰，除非成功考上武科大学，否则他将来充其量也就是一个苦逼上班族的命，那不是他想要的生活。</p>
                    <p>　　在武风盛行的联邦，普通上班族，哪怕是精英白领，地位都不如一个武者学徒。</p><p>　　无奈地摇摇头，杜牧收拾心情，起身练了会学校教授的基础拳式，狠狠出了一身汗，洗完澡后便回到自己的房间，拿出课本开始学习。</p>
                    <p>　　一直到将近深夜，他才放下书本，揉了揉眉心，上床准备睡觉。</p><p>　　“明天还有武道课，要早点睡才行。”</p><p>　　要是还像今天那样无精打采的话，武道课上肯定少不了被老师一通训。</p>
                    <p>　　身体一碰到床铺，杜牧体内倦意立刻如潮水涌来，不多时意识就陷入了黑暗之中。</p><p>　　朦朦胧胧间，他脑海猛地一震，消散的意识瞬间卷土重来，整个人陡地睁开眼睛，起身坐直，入目所见便是一片灰扑扑的诡异迷雾。</p>
                    <p>　　“又做梦了......”</p>")
		);
//		var_dump($id);
		$type = $this->input->get('type', TRUE);
		header('Content-Type:application/json');
		if($type == 'next'){
			$data = array('id'  => $zid+1,'title' => '第二章 凑在一块', 'body' => "<p>　　残阳西落，橙红色的阳光洒落在启明高中的门口，让每一个经过的学子都仿佛披上了一层赤红的轻纱。</p>
                    <p>　　几个十六七岁的少年凑在一块，一边朝校门走去，一边嘻嘻哈哈地笑闹。</p>
                    <p>　　“我说阿牧，你今天是怎么了，从早上开始就一直打呵欠，上课的时候也一直在睡觉，昨晚干嘛去了？”</p>
                    <p>　　一个微胖的少年注意到身边好友疲惫的模样，诧异地询问道。</p>
                    <p>　　“怕不是通宵看小黄本了？”另一个少年露出猥琐的笑容。</p>
                    <p>　　“哦？什么本子这么精彩？”几个少年眼睛一亮，纷纷起哄，“也借给我看一下啊！”</p>
                    <p>　　杜牧瞥了他们一眼，脸上闪过一丝无奈，微微摇头：“我没看本子。”</p>
                    <p>　　“切，信你才有鬼！”</p><p>　　“就是！”</p><p>　　“不看本子，总不会是通宵复习了吧？”</p>
                    <p>　　几人一路打打闹闹，来到分岔口后才挥手分别，杜牧独自一人拐向左边，走了四五分钟后，脚步一转，步入一条略显脏乱的小巷里。</p>
                    <p>　　巷子宽逾两米，相对于明亮宽敞的大街来说，显得有些阴森。</p><p>　　走没几步，杜牧眼角余光便瞥见对面走来三个赤膊纹身，模样轻佻的混混青年。</p>
                    <p>　　他脚下微微一顿，紧跟着又恢复正常，装作若无其事般避到一旁，沿着墙边从三人身旁经过。</p>
                    <p>　　三个混混斜睨了杜牧一眼，见是个背着肩包，衣着寒酸的高中生，撇了撇嘴，扭过头继续笑骂。</p>
                    <p>　　见状，杜牧连忙快走几步，拐过巷口，耳边听着三人渐行渐远的笑声，心中不由一松。</p>
                    <p>　　这片街区坐落在昊光市西北最偏僻的角落，治安一向不是很好，经常有混混和扒手在附近厮混，时不时就有打架斗殴或者抢劫之类的案件发生。</p>
                    <p>　　也不知是不是因为太过偏僻的缘故，就连警察都不愿意多管这片街区的事，哪怕接到报案，大多时候都是应付一下了事。</p>
                    <p>　　拜此所赐，杜牧平日里经过这附近的时候，都很是小心提防，深怕被那些混混缠上。</p>
                    <p>　　说到底他只是个身体还未发育完全的普通高中生，剑术连门都未入，武技更是一窍不通，绝不是精通街架的混混们的对手。</p>
                    <p>　　辗转来到一处破旧的老式公寓前，杜牧神情沉郁地从口袋里掏出钥匙，咔嚓一声打开屋门，闪身进入。</p>
                    <p>　　屋内一片寂静黑暗。</p><p>　　自从相依为命的姐姐前往外市上学后，整个公寓就只剩他一个人住了，显得有些清冷。</p>
                    <p>　　随手将书包扔在客厅的沙发上，杜牧来到厨房，打开壁橱取出一袋面包，就着凉水草草解决了晚餐。</p>
                    <p>　　填饱肚子后，他也不休息，直接在客厅冰凉的地板上盘腿就坐，双手交叉放在腿间，闭上眼睛开始修炼百罗呼吸法。</p>
                    <p>　　自从百年前武道初兴，武技蓬勃发展以来，各种炼体的基础呼吸法诀和吐纳术便层出不穷，让人眼花缭乱，各个武道流派都坚称自己的炼体法诀才是最优良的，直到三十年前武圣百罗横空出世，集合众多炼体法诀，取长补短，去芜存菁创造出了百罗呼吸法后，纷争才告一段落。</p>
                    <p>　　作为亚合联邦有史以来天赋最为卓越，实力公认最强的武圣，百罗集众家之所长创造而出的呼吸法，自然无人敢质疑其权威性，事实上之后的岁月也证明了，百罗呼吸法的效果的确远强于其他基础炼体法诀，十分适合普通人打基础和锻炼体魄。</p>
                    <p>　　也因此，亚合联邦开始大力推广百罗呼吸法，历经三十年的努力，如今这项呼吸法已然成为全民修炼必备的基础炼体法诀，基本上所有高中生都从小修炼。</p>
                    <p>　　杜牧自然不例外。</p><p>　　客厅中央，杜牧盘膝而坐，眼眸紧闭，胸膛以一种奥妙规律的节奏缓慢起伏着，呼吸渐渐变得绵长而又悠远。</p>
                    <p>　　随着时间的流逝，他渐渐感觉到小腹处产生一股微弱的暖流，顺着吐息缓缓流遍四肢百骸，让人有种好像泡在温泉中一样的温暖舒适感。</p>
                    <p>　　可惜这股感觉并没有持续太久。</p><p>　　约莫二十分钟后，暖流消失无踪，杜牧从令人着迷的舒适感中清醒过来，第一时间查看身体的状态，发现并没有明显的改变后，脸上不由浮现一丝沮丧。</p>
                    <p>　　“果然，单靠这呼吸法，要想在四个月内成为武者学徒根本是做梦。”</p>
                    <p>　　百罗呼吸法十分适合普通人强身健体，但也仅此而已，仅凭这一呼吸法就成为武者的人实属凤毛麟角，哪怕是成为武者学徒的都不多见。</p>
                    <p>　　何况和绝大多数普通人一样，杜牧并没有练武的资质，剑术至今还未入门，体魄也仅仅是普通高中生的水平，别说成为武者了，就算是武者学徒，对他来说也是个不小的挑战。</p>
                    <p>　　“武科大学，哪怕只是昊光市本地的武科大，招录学员的最低标准都是武者学徒，不突破这一关，想要上武科大学根本不可能！”</p>
                    <p>　　“眼下已经是高三第二学期，距离大考还有不到三个月，要在这段时间内突破到武者学徒境界......”</p><p>　　杜牧咬牙，心中涌起一股涩然。</p>
                    <p>　　成为武者一直是他的梦想！</p><p>　　在联邦，武者享有尊崇的地位和各式各样的特权，财富名声唾手可得，杜牧不知多少回在睡梦中梦见自己成为了强大的武者，名利双收，一举走上人生巅峰。</p>
                    <p>　　然而梦是美好的，现实却十分残酷，他出身贫寒，和姐姐相依为命，靠着联邦补助金勉强过活，完全是穷小子一个，没有多余的金钱购买药材辅助修炼，习武天资更是平平，想成为武者学徒千难万难。</p>
                    <p>　　唯一称得上优点的也就只有还算不错的文化成绩。</p><p>　　可惜这一点并没有多大用处。</p>
                    <p>　　杜牧对自己的定位很清晰，除非成功考上武科大学，否则他将来充其量也就是一个苦逼上班族的命，那不是他想要的生活。</p>
                    <p>　　在武风盛行的联邦，普通上班族，哪怕是精英白领，地位都不如一个武者学徒。</p><p>　　无奈地摇摇头，杜牧收拾心情，起身练了会学校教授的基础拳式，狠狠出了一身汗，洗完澡后便回到自己的房间，拿出课本开始学习。</p>
                    <p>　　一直到将近深夜，他才放下书本，揉了揉眉心，上床准备睡觉。</p><p>　　“明天还有武道课，要早点睡才行。”</p><p>　　要是还像今天那样无精打采的话，武道课上肯定少不了被老师一通训。</p>
                    <p>　　身体一碰到床铺，杜牧体内倦意立刻如潮水涌来，不多时意识就陷入了黑暗之中。</p><p>　　朦朦胧胧间，他脑海猛地一震，消散的意识瞬间卷土重来，整个人陡地睁开眼睛，起身坐直，入目所见便是一片灰扑扑的诡异迷雾。</p>
                    <p>　　“又做梦了......”</p>");
			echo json_encode($data);
		}else if($type == 'previous'){
			$data = array('id'  => $zid-1,'title' => '第二章 凑在一块', 'body' => "<p>　　残阳西落，橙红色的阳光洒落在启明高中的门口，让每一个经过的学子都仿佛披上了一层赤红的轻纱。</p>
                    <p>　　几个十六七岁的少年凑在一块，一边朝校门走去，一边嘻嘻哈哈地笑闹。</p>
                    <p>　　“我说阿牧，你今天是怎么了，从早上开始就一直打呵欠，上课的时候也一直在睡觉，昨晚干嘛去了？”</p>
                    <p>　　一个微胖的少年注意到身边好友疲惫的模样，诧异地询问道。</p>
                    <p>　　“怕不是通宵看小黄本了？”另一个少年露出猥琐的笑容。</p>
                    <p>　　“哦？什么本子这么精彩？”几个少年眼睛一亮，纷纷起哄，“也借给我看一下啊！”</p>
                    <p>　　杜牧瞥了他们一眼，脸上闪过一丝无奈，微微摇头：“我没看本子。”</p>
                    <p>　　“切，信你才有鬼！”</p><p>　　“就是！”</p><p>　　“不看本子，总不会是通宵复习了吧？”</p>
                    <p>　　几人一路打打闹闹，来到分岔口后才挥手分别，杜牧独自一人拐向左边，走了四五分钟后，脚步一转，步入一条略显脏乱的小巷里。</p>
                    <p>　　巷子宽逾两米，相对于明亮宽敞的大街来说，显得有些阴森。</p><p>　　走没几步，杜牧眼角余光便瞥见对面走来三个赤膊纹身，模样轻佻的混混青年。</p>
                    <p>　　他脚下微微一顿，紧跟着又恢复正常，装作若无其事般避到一旁，沿着墙边从三人身旁经过。</p>
                    <p>　　三个混混斜睨了杜牧一眼，见是个背着肩包，衣着寒酸的高中生，撇了撇嘴，扭过头继续笑骂。</p>
                    <p>　　见状，杜牧连忙快走几步，拐过巷口，耳边听着三人渐行渐远的笑声，心中不由一松。</p>
                    <p>　　这片街区坐落在昊光市西北最偏僻的角落，治安一向不是很好，经常有混混和扒手在附近厮混，时不时就有打架斗殴或者抢劫之类的案件发生。</p>
                    <p>　　也不知是不是因为太过偏僻的缘故，就连警察都不愿意多管这片街区的事，哪怕接到报案，大多时候都是应付一下了事。</p>
                    <p>　　拜此所赐，杜牧平日里经过这附近的时候，都很是小心提防，深怕被那些混混缠上。</p>
                    <p>　　说到底他只是个身体还未发育完全的普通高中生，剑术连门都未入，武技更是一窍不通，绝不是精通街架的混混们的对手。</p>
                    <p>　　辗转来到一处破旧的老式公寓前，杜牧神情沉郁地从口袋里掏出钥匙，咔嚓一声打开屋门，闪身进入。</p>
                    <p>　　屋内一片寂静黑暗。</p><p>　　自从相依为命的姐姐前往外市上学后，整个公寓就只剩他一个人住了，显得有些清冷。</p>
                    <p>　　随手将书包扔在客厅的沙发上，杜牧来到厨房，打开壁橱取出一袋面包，就着凉水草草解决了晚餐。</p>
                    <p>　　填饱肚子后，他也不休息，直接在客厅冰凉的地板上盘腿就坐，双手交叉放在腿间，闭上眼睛开始修炼百罗呼吸法。</p>
                    <p>　　自从百年前武道初兴，武技蓬勃发展以来，各种炼体的基础呼吸法诀和吐纳术便层出不穷，让人眼花缭乱，各个武道流派都坚称自己的炼体法诀才是最优良的，直到三十年前武圣百罗横空出世，集合众多炼体法诀，取长补短，去芜存菁创造出了百罗呼吸法后，纷争才告一段落。</p>
                    <p>　　作为亚合联邦有史以来天赋最为卓越，实力公认最强的武圣，百罗集众家之所长创造而出的呼吸法，自然无人敢质疑其权威性，事实上之后的岁月也证明了，百罗呼吸法的效果的确远强于其他基础炼体法诀，十分适合普通人打基础和锻炼体魄。</p>
                    <p>　　也因此，亚合联邦开始大力推广百罗呼吸法，历经三十年的努力，如今这项呼吸法已然成为全民修炼必备的基础炼体法诀，基本上所有高中生都从小修炼。</p>
                    <p>　　杜牧自然不例外。</p><p>　　客厅中央，杜牧盘膝而坐，眼眸紧闭，胸膛以一种奥妙规律的节奏缓慢起伏着，呼吸渐渐变得绵长而又悠远。</p>
                    <p>　　随着时间的流逝，他渐渐感觉到小腹处产生一股微弱的暖流，顺着吐息缓缓流遍四肢百骸，让人有种好像泡在温泉中一样的温暖舒适感。</p>
                    <p>　　可惜这股感觉并没有持续太久。</p><p>　　约莫二十分钟后，暖流消失无踪，杜牧从令人着迷的舒适感中清醒过来，第一时间查看身体的状态，发现并没有明显的改变后，脸上不由浮现一丝沮丧。</p>
                    <p>　　“果然，单靠这呼吸法，要想在四个月内成为武者学徒根本是做梦。”</p>
                    <p>　　百罗呼吸法十分适合普通人强身健体，但也仅此而已，仅凭这一呼吸法就成为武者的人实属凤毛麟角，哪怕是成为武者学徒的都不多见。</p>
                    <p>　　何况和绝大多数普通人一样，杜牧并没有练武的资质，剑术至今还未入门，体魄也仅仅是普通高中生的水平，别说成为武者了，就算是武者学徒，对他来说也是个不小的挑战。</p>
                    <p>　　“武科大学，哪怕只是昊光市本地的武科大，招录学员的最低标准都是武者学徒，不突破这一关，想要上武科大学根本不可能！”</p>
                    <p>　　“眼下已经是高三第二学期，距离大考还有不到三个月，要在这段时间内突破到武者学徒境界......”</p><p>　　杜牧咬牙，心中涌起一股涩然。</p>
                    <p>　　成为武者一直是他的梦想！</p><p>　　在联邦，武者享有尊崇的地位和各式各样的特权，财富名声唾手可得，杜牧不知多少回在睡梦中梦见自己成为了强大的武者，名利双收，一举走上人生巅峰。</p>
                    <p>　　然而梦是美好的，现实却十分残酷，他出身贫寒，和姐姐相依为命，靠着联邦补助金勉强过活，完全是穷小子一个，没有多余的金钱购买药材辅助修炼，习武天资更是平平，想成为武者学徒千难万难。</p>
                    <p>　　唯一称得上优点的也就只有还算不错的文化成绩。</p><p>　　可惜这一点并没有多大用处。</p>
                    <p>　　杜牧对自己的定位很清晰，除非成功考上武科大学，否则他将来充其量也就是一个苦逼上班族的命，那不是他想要的生活。</p>
                    <p>　　在武风盛行的联邦，普通上班族，哪怕是精英白领，地位都不如一个武者学徒。</p><p>　　无奈地摇摇头，杜牧收拾心情，起身练了会学校教授的基础拳式，狠狠出了一身汗，洗完澡后便回到自己的房间，拿出课本开始学习。</p>
                    <p>　　一直到将近深夜，他才放下书本，揉了揉眉心，上床准备睡觉。</p><p>　　“明天还有武道课，要早点睡才行。”</p><p>　　要是还像今天那样无精打采的话，武道课上肯定少不了被老师一通训。</p>
                    <p>　　身体一碰到床铺，杜牧体内倦意立刻如潮水涌来，不多时意识就陷入了黑暗之中。</p><p>　　朦朦胧胧间，他脑海猛地一震，消散的意识瞬间卷土重来，整个人陡地睁开眼睛，起身坐直，入目所见便是一片灰扑扑的诡异迷雾。</p>
                    <p>　　“又做梦了......”</p>");
			echo json_encode($data);
		}else{
			//从第zip章开始加载
//			$zid = $this->input->get('zid', TRUE);
			if($zid){
				echo json_encode($data1);
			}else{
				//默认从第一章
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
