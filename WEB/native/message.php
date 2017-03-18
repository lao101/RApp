<?php
    class Message
    {
        static function getMessage()
        {
            $link = Connect::getConnect();
            $sql = "select * from messages";
            $json = array();
            $result = $link->query($sql);
            while($row = $result->fetch_object())
            {
                $arr = array(
                    "id" => $row->message_id,
                    "name" => $row->name,
                    "message" => $row->message
                );
                array_push($json, $arr);
            }
            $result->close();
            $link->close();
            $jsonstring = json_encode($json);
            return $jsonstring;
        }

        static function setMessage($name, $message)
        {
            $link = Connect::getConnect();
            $sql = "insert into messages values(null, '$name', '$message')";
            $result = $link->query($sql);
            if ($result):
                return true;
            else:
                return false;
            endif;
        }
    }
?>
