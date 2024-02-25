<?php

class Post
{
    private $post_id;
    private $title;
    private $content;
    private $image;
    private $user_id;
    private $database;

    public function __construct($database)
    {
        $this->database = $database != null ? $database : new DatabaseConnection();
    }

    public function save() {
        if($this->post_id != null){
            /*$queries = [];
            $strquery = "UPDATE posts SET ";
            if($this->title != null) {
                $queries[] = "title = ?";
            }
            if($this->content != null) {
                $queries[] = "content = ?";
            }
            if($this->image != null) {
                $queries[] = "image = ?";
            }
            for($i = 0; $i < count($queries); $i++) {
                if($i == 0) {
                    $strquery = $strquery . $queries[$i];
                }
                $strquery = $strquery . " AND " . $queries[$i];
            }
            echo $strquery;*/
            //return $this->database->getQuery("UPDATE users SET name = \"$this->name\", email = \"$this->email\", password = \"$this->password\", company = \"$this->company\" WHERE id = $this->id;");
            //return $this->database->fulfilQuery("UPDATE posts SET ")
            return $this->database->fulfilQuery("UPDATE posts SET title = ?, content = ?, image = ?, user_id = ? WHERE post_id = ?;", [$this->title, $this->content, $this->image, $this->user_id, $this->post_id]);
        }

        return $this->database->fulfilQuery("INSERT INTO posts (title, content, image, user_id) VALUES (?, ?, ?, ?);", [$this->title, $this->content, $this->image, $this->user_id]);
    }

    public function addPost($params) {
        $this->title = $params["title"];
        $this->content = $params["content"];
        $this->image = isset($params["image"]) ? $params["image"] : "";
        $this->user_id = $params["user_id"];

        $this->save();
    }

    public function updatePost($params) {
        $this->post_id = $params["post_id"];
        $this->title = $params["title"];
        $this->content = $params["content"];
        $this->image = isset($params["image"]) ? $params["image"] : "";
        $this->user_id = $params["user_id"];

        $this->save();
    }

    public function loadPostImage($image) {
        $type = $image["type"];

        $name = md5(microtime()).".".str_replace("image/", "", $type);
        $this->image = $name;
        $dir = "uploads/postImage/";
        $uploadfile = $dir.$name;

        if(move_uploaded_file($image["tmp_name"], $uploadfile)) {
            /*$sqlquery = "UPDATE users SET avatar = ? WHERE id = ?;";
            $stmt = mysqli_prepare($this->database->getConnect(), $sqlquery);

            if(!$stmt) {
                die("Error with prepare statement");
            }

            mysqli_stmt_bind_param($stmt, "si", $user_input_avatar_safe, $user_input_id_safe);
            $user_input_avatar_safe = mysqli_real_escape_string($this->database->getConnect(), $this->avatar);
            $user_input_id_safe = (int)$this->id;

            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);*/
            return $this->image;
        }

        return "";
    }


}