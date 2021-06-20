<?php
function connect()
{
    return mysqli_connect("127.0.0.1","root","","vote_form");
}
function getCandidate()
{
    $conn = connect();
    $sql = "SELECT * FROM candidate";
    return mysqli_query($conn,$sql);
}
function canVote($id_card)
{
    $conn = connect();
    $sql = "SELECT * FROM `voters` WHERE `id_card` = '$id_card'";
    $a = mysqli_query($conn,$sql);
    if ($result = mysqli_fetch_assoc($a)){
        if ($result['is_voted'] == "0"){
            return TRUE;
        }else{
            return FALSE;
        }
    }else{
        return FALSE;
    }
}
function setVoted($ids,$id_card)
{
    $conn = connect();
    $sql = "UPDATE `voters` SET `is_voted`=1 WHERE `id_card` = $id_card";
    mysqli_query($conn,$sql);
    if (count($ids) <= 4) {
        foreach ($ids as $id => $value) {
            $sql = "UPDATE `candidate` SET `vote_count` = `vote_count` + 1 WHERE `id` = $id";
            mysqli_query($conn,$sql);
        }
    }
}
function isAdmin($form){
    $conn = connect();
    $sql = "SELECT `password` FROM `admin` WHERE `username` = '$form[username]'";
    $res = mysqli_query($conn,$sql);
    $paas = mysqli_fetch_assoc($res);
    if ($form['password']==$paas['password']){
        return TRUE;
    }else{
        return FALSE;
    }
}