<?php

class Router
{
    private $uriStr = "";
    private $routes = [
        "" => "index.php",
        "index" => "index.php",
        "about" => "about.php",
        "auth" => "auth.php",
        "registr" => "registr.php",
        "userpage" => "userpage.php",
        "post" => "post.php",
        "edituser" => "edituser.php",
        "summersault" => "summersault.php"
    ];

    /**
     * @param string $uriStr
     */
    public function __construct(string $uriStr)
    {
        $this->uriStr = trim(parse_url($uriStr)["path"], "/");
        $a = 11;
    }

    public function showview() : String
    {
        foreach ($this->routes as $route => $controller) {
            if ($this->uriStr === $route) {
                if(file_exists(CONTROLLERS . "/$controller")) {
                    return CONTROLLERS . "/$controller";
                }
                return VIEWS . "/errors/technicalwork.tpl.php";
            }
        }
        return abort();
    }


}