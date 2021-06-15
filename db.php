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
function setVoted($id)
{
    $conn = connect();
    $sql = "UPDATE `voters` SET `is_voted`='1' WHERE `id_card` = '$id_card'";
    $a = mysqli_query($conn,$sql);
    echo $a;
}