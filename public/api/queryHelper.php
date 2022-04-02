<?php
function validTitleQuery()
{

  return queryHasOneKey() && titleQueryExists() && titleIsString()
    && titleIsValidString() && containsOnlyOneQuery();
}

function titleQueryExists()
{
  return array_key_exists("title", $_GET);
}

function queryHasOneKey()
{
  return count($_GET) == 1;
}

function titleIsString()
{
  $titleQuery = $_GET["title"];
  return is_string($titleQuery);
}

function titleIsValidString()
{
  $titleQuery = $_GET["title"];
  if ($titleQuery == "") {
    return false;
  } else {
    return true;
  }
}

function containsOnlyOneQuery()
{
  $pattern = "&";
  $titleQuery = $_SERVER['QUERY_STRING'];
  if (str_contains($titleQuery, $pattern)) {
    return false;
  } else
    return true;
}



// ?title=alien&title=alien
// ?title=alien&title=alien&title=alien
