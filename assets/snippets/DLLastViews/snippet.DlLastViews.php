<?php
/**
 * DLLastViews
 *
 * Conclusion viewed products with DocLister.
 *
 * @category    snippet
 * @version     1.1
 * @internal    @properties &expired=Время хранения cookie;text;2592000;2592000;по умолчанию: 30 дней &maxDocs=Сколько документов запоминать;text;5;5
 * @internal    @modx_category Content
 * @internal    @installset base
 * @author      Created By mkot, optimization Pathologic
 *
 * @lastupdate  04/09/2017
 */

if (!isset($params['mode'])) $params['mode'] = 'register';
if (!isset($params['tpl'])) $params['tpl'] = '@CODE: <a href="[+url+]">[+title+]</a>';
$maxDocs = isset($maxDocs) ? $maxDocs : 5;
$expired = isset($expired) ? $expired  : 2592000;
$params['idType'] = 'documents';
$item = array();

if (isset($_COOKIE['last_view']) and $_COOKIE['last_view'] != '') {
    $params['documents'] = $_COOKIE['last_view'];
        $item = explode(',', $_COOKIE['last_view']);
}

switch ($params['mode']) {
    case 'register':
        if (!in_array($modx->documentIdentifier, $item)) {
            array_unshift($item, $modx->documentIdentifier);
            array_slice($item, 0, $maxDocs - 1);
            setcookie('last_view', implode(',', $item), time()+$expired, '/');
        }
    break;

    case 'show':
        if (!empty($item)) {
                        return $modx->runSnippet('DocLister',$params);
                }
    break;
        default:
        break;
}
