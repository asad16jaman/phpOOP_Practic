<?php
spl_autoload_register(function ($class) {
    $rootDirectory = __DIR__."/";
    $file = $rootDirectory.str_replace('\\','/',$class).'.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

trait TraitName
{
    public $title;
    public $name;
    
    public function messages(){
        return "it is come from trites";
    }
}

trait MoveMe{
    public $mypos = 0;
    public function next(){
        $this->mypos++;
    }
    public function prev(){
        $this->mypos--;
    }
}


class User{
    public $name,$home,$phone,$age;
    public function __construct($name,$home,$phone,$age){
        $this->name = $name;
        $this->home = $home;
        $this->phone = $phone;
        $this->age = $age;
    }
    public function author_detail(){
        return "name is {$this->name} home is {$this->home}";
    }
}

$p1 = new User('Anurag Kashyap',"Delli",4578,65);
$p2 = new User('Karan Johar',"Mumbai",4578,53);
$p3 = new User('Farhan Akhtar',"Karnatika",4578,37);
$p4 = new User('Ekta Kapoor',"Mumbai",4578,35);

$d1 = new User("Rajkumar Hirani","Mumbai",1450,66);
$d2 = new User("Mani Ratnam","Panjabi",1450,66);
$d3 = new User("S. Shankar","Delli",1450,66);
$d4 = new User("S. S. Rajamouli","Telegu",1450,66);

$s1 = new User("Arigit-Sing","Kalkata",4578,32);
$s2 = new User("Srya Ghosal","Kalkata",4578,32);
$s3 = new User("Palak Musal","Mumbai",4578,32);
$s4 = new User("Sonnu Nigham","Delli",4578,62);

$actor1 = new User("Shahruk khan","Delli",540,55);
$actor2 = new User("Salman","Mumbai",54780,55);
$actor3 = new User("Amir khan","Delli",6580,55);
$actor4 = new User("Ranvir kapoor","Delli",4780,55);
$actor1 = new User("Aditya Roy kapoor","Delli",5460,55);

$actress1 = new User("Depika","Delli",1245,55);
$actress2 = new User("Disa patani","Delli",4578,55);
$actress3 = new User("Kyara Adbani","Delli",5478,55);
$actress4 = new User("Sonam kapoor","Delli",547896,55);



class Song{
    use TraitName;
    public $producer,$director,$singer,$duration;
    public $model = [];
    public function __construct(string $name,string $title,User $producer ,User $director,User $singer,float $duration){
        $this->name = $name;
        $this->title = $title;
        $this->producer = $producer;
        $this->director = $director;
        $this->singer = $singer;
        $this->duration = $duration;
    }
    public function addModel(User $model){
        $this->model[] = $model;
    }    
}


$song1 = new Song("Main tere oaste","it is my fevourite song",$p1,$d1,$s1,5.3);




$song2 = new Song("O mere ham safar","this song was created by omuk",$p1,$d2,$s1,6.3);
$song10 = new Song("Ashiki song","Tu meri ebadat hai",$p3,$d4,$s3,5.3);

$song3 = new Song("Cholo rastai saji tramlite","it is my fevourite song",$p4,$d1,$s2,5.3);

$song4 = new Song("main to jasa khoia hu","tumko paia main to jasa khoia hou",$p3,$d4,$s4,5.3);
$song5 = new Song("tere bin","tere bin chalna bhi saja",$p3,$d3,$s4,5.3);
$song6 = new Song("jo owada kya","jo woada kiya ta nibhana parega",$p2,$d3,$s4,5.3);

$song7 = new Song("o khuda","o khuda bata de kya lakiro me likaha",$p1,$d1,$s3,5.3);
$song8 = new Song("sanam teri kasam","saman teri kasam",$p3,$d1,$s3,5.3);
$song9 = new Song("Main tere oaste","it is my fevourite song",$p1,$d1,$s1,5.3);



class PlayList{
    use TraitName,MoveMe;
    public $language;
    public $song = [];
    public function __construct(string $name,string $title,string $language) {
        $this->name= $name;
        $this->title = $title;
        $this->language = $language;
    }
    public function addSong(Song $song){
        $this->song[] = $song;
    }
    public function totalSong(){
        return count($this->song);
    }

}


$arigit = new PlayList("Arigit song","all arigit song is hare","language") ;
$arigit->addSong($song1);
$arigit->addSong($song2);
$arigit->addSong($song9);

$sonuNigham = new PlayList("Soun nigham song","all soun nigham song is hare","hindi") ;
$sonuNigham->addSong($song4);
$sonuNigham->addSong($song5);
$sonuNigham->addSong($song6);

$palak = new PlayList("Palak musal","All song of palak musal is hare","hindi") ;
$palak->addSong($song7);
$palak->addSong($song8);
$palak->addSong($song10);

$srya = new PlayList("Sraya ghusal","all song of srya ghusal is hare","hind&bangla") ;
$srya->addSong($song3);



class Player{
    use MoveMe;
    public $playerTitle = "it is only for mp3 player";
    public $playList=[];
    public function totalPlayList(){
        return count($this->playList);
    }
    public function addPlayList(PlayList $playList){

        array_push($this->playList,$playList);
    }
}

$player = new Player;
$player->addPlayList($arigit);
$player->addPlayList($sonuNigham);
$player->addPlayList($palak);
$player->addPlayList($srya);


// maintain playlist......
$player->next();
$player->next();
$player->prev();
$myplaylist = $player->playList[$player->mypos];


echo $myplaylist->totalSong()."<br>";

// maintain song....
$myplaylist->next();
$myplaylist->next();
$mysong = $myplaylist->song[$myplaylist->mypos];
var_dump( $mysong );



