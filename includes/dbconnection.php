<?php

$con = mysqli_connect(
    "fdb1034.awardspace.net",
    "4756754_resultgrading",
    "X0DLBmO22B6Qn9Os",
    "4756754_resultgrading"
);

if (mysqli_connect_errno()) {
    die("Connection Fail: " . mysqli_connect_error());
}