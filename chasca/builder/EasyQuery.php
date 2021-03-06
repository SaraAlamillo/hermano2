<?php

//ini_set("log_errors", 1);
//ini_set("display_errors", 0);
//ini_set("error_log", "easyquery.log");

class config {

    public static $QBREST_HOST = "http://sqlquerybuilder.com/";
    public static $QBREST_KEY = "1f4f5f3b-edfe-43e6-b014-bcaa21c6c763"; //<-- change to your API key
    public static $MODEL_NAME = "hermano"; //<-- change to the name of your model
    public static $MODEL_FILE_JSON = "hermano.json"; //<-- change to the name of your model file
    public static $DB_NAME = 'hermano';
    public static $DB_HOST = 'localhost';
    public static $DB_PORT = '3306'; //default mysql port
    public static $DB_USER = 'root';
    public static $DB_PASSWD = '';

}

function getTypeName($type) {
    $types[1] = 'number';
    $types[2] = 'number';
    $types[3] = 'number';
    $types[4] = 'number';
    $types[5] = 'number';
    $types[5] = 'number';
    $types[8] = 'number';
    $types[9] = 'number';
    $types[246] = 'number';
    $types[7] = 'datetime';
    $types[10] = 'datetime';
    $types[11] = 'datetime';
    $types[12] = 'datetime';
    if (!isset($types[$type]))
        return 'string';
    return $types[$type];
}

function renderDataTable($recordSet) {
    $ret = array();

    $columns = $recordSet->fetch_fields();
    foreach ($columns as $col) {
        $columnDescr = array();
        $columnDescr['id'] = $col->name;
        $columnDescr['label'] = $col->name;
        $columnDescr['type'] = getTypeName($col->type);
        $ret['cols'][] = $columnDescr;
    }

    while ($array = $recordSet->fetch_array(MYSQLI_ASSOC)) {
        $values = array_values($array);
        $rowData = array();
        $rowData['c'] = array();
        $col_index = 0;
        foreach ($values as $value) {
            if ($ret['cols'][$col_index]['type'] == 'number') {
                $rowData['c'][] = array("v" => $value * 1);
            } else {
                $rowData['c'][] = array("v" => $value);
            }
            $col_index++;
        }
        $ret['rows'][] = $rowData;
    }
    return $ret;
}

function renderRequestedList($recordSet) {
    $ret = array();
    while ($array = $recordSet->fetch_array(MYSQLI_NUM)) {
        if (!isset($array[1]))
            $array[1] = $array[0];
        $ret[] = array('id' => $array[0], 'text' => $array[1]);
    }
    $ret_json = json_encode($ret);
    return $ret_json;
}

function executeSql($sql) {
    $mysqli = new mysqli(config::$DB_HOST, config::$DB_USER, config::$DB_PASSWD, config::$DB_NAME, config::$DB_PORT);
    if ($mysqli->connect_error) {
        return null;
    }
    return $mysqli->query($sql);
}

function buildSql($query_json) {
    //send a request to the REST web-service	
    $url = config::$QBREST_HOST . 'api/v1/SqlQueryBuilder';
    $request_data = '{"modelName":"' . config::$MODEL_NAME . '", "query":' . $query_json . '}';

    //error_log($request_data);

    $options = array(
        'http' => array(
            'header' => "Content-type: application/json\r\nSQB-Key: " . config::$QBREST_KEY,
            'method' => 'POST',
            'content' => $request_data,
        ),
    );
    $context = stream_context_create($options);

    $response = file_get_contents($url, false, $context);

    //get a response in JSON format	
    if ($response !== FALSE) {
        $res = json_decode($response, true);

        $sql = "";
        //now we get an SQL statement by the query defined on client-side
        if ($res != null && array_key_exists("sql", $res))
            $sql = $res["sql"];


        return $sql;
    }
    else {
        return 'ERROR';
    }
}

$action = $_REQUEST['action'];

if ($action == 'getModel') {

    //get model name
    $model_name = $_POST['modelName'];


    //read model from a file and return in response
    $model = file_get_contents(config::$MODEL_FILE_JSON);
    echo $model;
} else if ($action == 'loadQuery') {

    //get query name
    $query_name = $_POST['queryName'];


    //read query from a file and return in response
    $query_file_name = $query_name . ".json";
    $query_json = file_get_contents($query_file_name);

    echo $query_json;
} else if ($action == 'saveQuery') {

    //get query name
    $query_name = $_POST['queryName'];

    //get query in JSON format
    $query_json = $_POST['queryJson'];

    //save query to a file
    $query_file_name = $query_name . ".json";
    file_put_contents($query_file_name, $query_json);

    echo '{"result":"OK"}';
} else if ($action == 'buildQuery') {
    //Deprecated! This action isn't called from EQ widgets starting from version 3.6.0 of the library
    //return generated SQL  to show it on our demo web-page. Not necessary to do in production!
    $queryJson = $_POST['queryJson'];
    $sql = buildSql($queryJson);

    $result = json_encode(array('statement' => $sql));
    echo $result;
} else if ($action == 'syncQuery') {
    //return generated SQL to show it on our demo web-page. Not necessary to do in production!
    $queryJson = $_POST['queryJson'];
    $sql = buildSql($queryJson);

    $result = json_encode(array('statement' => $sql));
    echo $result;
} else if ($action == 'executeQuery') {
    //get query in JSON format
    $query_json = $_POST['queryJson'];
    $sql = buildSql($query_json);
    $result = '{}';
    $recordSet = executeSql($sql);
    if ($recordSet) {
        $resultSet = renderDataTable($recordSet);
        $ret = array('statement' => $sql, 'resultSet' => $resultSet);

        $result = json_encode($ret);
    } else {
        $ret['statement'] = "DATABASE CONNECTION ERROR!!!";
        $result = json_encode($ret);
    }

    echo $result;
} else if ($action == 'listRequest') {
    //here  we need to assemble the requested list based on its name and return it as JSON array
    //each item in that array is an object with two properties: "id" and "text"
    //get the name of requested list
    $list_name = $_POST['listName'];


    if ($list_name == "SQL") {
        //if this is a SQL list request - we need to execute SQL statement and return the result set as a list of of {id, text} items

        if ($recordSet = executeSql($_POST['sql'])) {
            $result = renderRequestedList($recordSet);
            echo $result;
        }
        //$sql =  $_POST['sql'];
        //echo '[{"id":"SQL1","text":"SQL List Text 1"},{"id":"SQL2","text":"SQL List Text 1"},{"id":"SQL3","text":"SQL List Text 3"},{"id":"SQL4","text":"SQL List Text 4"}]';
    } else {
        //otherwise we return some list based on list name
        if ($list_name == "RegionsList") {
            echo '[{"id":"11","text":"AAAA"},{"id":"22","text":"BBBB"},{"id":"33","text":"CCCC"},{"id":"44","text":"DDDD"}]';
        } else {
            echo '[]';
        }
    }
} else
    echo '{"result": "OK"}';
?>