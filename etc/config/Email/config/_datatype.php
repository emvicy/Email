<?php

# documentation
#   https://mymvc.ueffing.net/3.4.x/generating-datatype-classes#array_config
# creation
#   php emvicy.php datatype:module Email

#---------------------------------------------------------------
#  Defining DataType Classes

$sThisModuleDir = realpath(__DIR__ . '/../../../../');
$sThisModuleName = basename($sThisModuleDir);
$sThisModuleDataTypeDir = $sThisModuleDir . '/DataType';
$sThisModuleNamespace = str_replace('/', '\\', substr($sThisModuleDataTypeDir, strlen($aConfig['MVC_MODULES_DIR'] . '/')));

// base setup
$aDataType = array(

    // directory
    'dir' => $sThisModuleDataTypeDir,

    // remove complete dir before new creation
    'unlinkDir' => false,

    // enable creation of events in datatype methods
    'createEvents' => true,
);

// classes
$aDataType['class']['Config'] = array(
    'name' => 'Config',
    'file' => 'Config.php',
    'namespace' => $sThisModuleNamespace,
    'createHelperMethods' => true,
    'constant' => array(
    ),
    'property' => array(
        array('key' => 'sAbsolutePathToFolderSpooler', 'var' => 'string',),
        array('key' => 'sAbsolutePathToFolderAttachment', 'var' => 'string',),
        array('key' => 'aIgnoreFile', 'var' => 'array', 'value' => array('..', '.', '.ignoreMe')),
        array('key' => 'sFolderNew', 'var' => 'string', 'value' => 'new'),
        array('key' => 'sFolderDone', 'var' => 'string', 'value' => 'done'),
        array('key' => 'sFolderRetry', 'var' => 'string', 'value' => 'retry'),
        array('key' => 'sFolderFail', 'var' => 'string', 'value' => 'fail'),
        array('key' => 'iAmountToSpool', 'value' => 10, 'var' => 'int'),
        array('key' => 'iMaxSecondsOfRetry', 'value' => (60 * 60 * 2), 'var' => 'int'),
        array('key' => 'oCallback', 'var' => '\Closure', 'value' => null),
    ),
);

// classes
$aDataType['class']['Email'] = array(
    'name' => 'Email',
    'namespace' => $sThisModuleNamespace,
    'createHelperMethods' => true,
    'constant' => array(
    ),
    'property' => array(
        array('key' => 'subject', 'var' => 'string',),
        array('key' => 'recipientMailAdresses', 'var' => 'array',),
        array('key' => 'text', 'var' => 'string',),
        array('key' => 'html', 'var' => 'string',),
        array('key' => 'senderMail', 'var' => 'string',),
        array('key' => 'senderName', 'var' => 'string',),
        array(
            'key' => 'oAttachment',
            'var' => '\\MVC\\DataType\\DTArrayObject',
            'value' => 'null',
        ),
    ),
);

// classes
$aDataType['class']['EmailAttachment'] = array(
    'name' => 'EmailAttachment',
    'namespace' => $sThisModuleNamespace,
    'createHelperMethods' => true,
    'constant' => array(
    ),
    'property' => array(
        array('key' => 'name', 'var' => 'string',),
//                array('key' => 'content',),
        array('key' => 'file', 'var' => 'string',),
    ),
);

#---------------------------------------------------------------
# copy settings to module's config
# in your code you can access this datatype config by: \MVC\Config::MODULE()['DATATYPE'];

$aConfig['MODULE'][$sThisModuleName]['DATATYPE'] = $aDataType;
