<?php

namespace Shukaljasmin\Response;

class ApiWarraper
{

    private static $message;
    private static $data;
    private static $extrabody;
    private static $status=0;


    public static function setStatus(int $status)
    {
        self::$status = $status;
        return new static();
    }

    public static function setMessage(string $message)
    {
        self::$message = $message;
        return new static();
    }

    public static function setData($data) {
        if(self::$data!="")
        {
            self::$data=array_merge(self::$data,$data);
        }
        else{
            self::$data=$data;

        }

        return new static();
    }

    public function toArray()
    {
        $responce=[
            "status" => self::$status,
            "data" => $this->data,
            "massage"=> $this->message,
        ];
        return $responce;
    }

    public static function meargeBody($data)
    {
        if(self::$extrabody!="")
        {
            self::$extrabody=array_merge(self::$extrabody,$data);
        }
        else{
            self::$extrabody=$data;

        }
        return new static();
    }

    public static function BodyBuild()
    {
        $reaponce=array();
        if(isset(self::$status))
        {
            $responce['status']=self::$status;
        }
        if(isset(self::$message))
        {
            $responce['message']=self::$message;
        }
        if(isset(self::$data))
        {
            $responce['data']=self::$data;
        }

        if(isset(self::$extrabody))
        {
            $responce=array_merge($responce,self::$extrabody);
        }

        return $responce;
    }

    public static function SuccessJson($msg="",$result =array()) {

        if(self::$status==0){
            self::$status = 1;
        }

        if(!empty($msg)){
            self::$message = $msg;
        }

        if(!empty($result)){
            if(self::$data!="")
            {
                self::$data=array_merge(self::$data,$result);
            }
            else{
                self::$data=$result;

            }
        }

        return response()->json(self::BodyBuild(), 200);
    }

    public static function ErrorJson($msg="",$result =array()) {
        // self::$status=0;
        if(self::$status!=0){
            self::$status = 0;
        }

        if(!empty($msg)){
            self::$message = $msg;
        }

        if(!empty($result)){
            if(self::$data!="")
            {
                self::$data=array_merge(self::$data,$result);
            }
            else{
                self::$data=$result;

            }
        }

        return response()->json(self::BodyBuild(), 200);
    }

}
