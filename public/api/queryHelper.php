<?php
function validTitleQuery()
{
  $titleQuery = $_GET["title"];
  return queryHasOneKey() && titleIsString($titleQuery)
    && titleQueryExists();
}

function titleQueryExists()
{
  return array_key_exists("title", $_GET);
}

function queryHasOneKey()
{
  return count($_GET) == 1;
}

function titleIsString($titleQuery)
{
  return is_string($titleQuery);
}
