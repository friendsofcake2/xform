<?php
/**
 * XFormjpHelper
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010, Yasushi Ichikawa http://github.com/ichikaway/
 * @package xformjp
 * @subpackage xformjp.xform.helper
 * @license http://www.opensource.org/licenses/mit-license.php The MIT License
 */

/**
 * XFormjpHelper for Japanese users.
 */

App::uses('XformHelper', 'Xform.View/Helper');
class XformjpHelper extends XformHelper
{
    /**
     * confirmation screen flag
     *
     * @var bool
     */
    public $confirmScreenFlag = false;

    /**
     * not fillin password value
     * if set false, password value is set on form input tag.
     *
     * @var bool
     */
    public $notFillinPasswordValue = true;

    /**
     * output value are escaped on confirmation screen.
     *
     * @var bool
     */
    public $doHtmlEscape = true;

    /**
     * execute nl2br() for output value on confirmation screen.
     *
     * @var bool
     */
    public $doNl2br = true;

    /**
     * If set true and change $doHtmlEcpane or $doNl2br properties,
     * these properties are not changed by default value after output.
     *
     * @var bool
     */
    public $escapeBrPermanent = false;

    /**
     * The field which has array data like checkbox(),
     * thease array value join with this separator on confirmation screen.
     *
     * @var string
     */
    public $confirmJoinSeparator = ', ';

    /**
     * change datetime separator on form input and confirmation screen.
     *
     * @var array
     *
     * Example:
     *   var $changeDatetimeSeparator = array(
     *       'datefmt' => array(
     *           'year' => ' / ',
     *           'month' => ' / ',
     *           'day' => '',
     *           'afterDateTag' => '&nbsp;&nbsp;&nbsp;', //set value between date and time tags.
     *           ),
     *       'timefmt' => array(
     *           'hour' => ' : ',
     *           'min' => '',
     *           'meridian' => '',
     *           )
     *       );
     */
    public $changeDatetimeSeparator = [
            'datefmt' => [
                'year' => '年',
                'month' => '月',
                'day' => '日',
                'afterDateTag' => '&nbsp;&nbsp;&nbsp;', //dateとtimeの表示の間に入れる文字列
                ],
            'timefmt' => [
                'hour' => '時',
                'min' => '分',
                'meridian' => '',
                ],
            ];

    /**
     * set default options for the input method.
     *
     * @var array
     */
    public $inputDefaultOptions = ['label' => false, 'error' => false, 'div' => false];

    /**
     * if set true, month name will be number.
     *
     * @var bool
     */
    public $monthNameSetNumber = true;

    /**
     * the create method which shows only form and input tag.
     * delete display:none, because can not send Token with Japanese mobile devices.
     *
     * @param string|null $model name
     * @param array $options
     * @return string
     */
    public function create($model = null, $options = [])
    {
        return strip_tags(parent::create($model, $options), '<form><input>');
    }

    /**
     * the end method which shows only form and input tag.
     * delete display:none, because can not send Token with Japanese mobile devices.
     *
     * @param array|string $options
     * @param array $secureAttributes
     * @return string
     */
    public function end($options = null, $secureAttributes = [])
    {
        return strip_tags(parent::end($options, $secureAttributes), '<form><input>');
    }
}
