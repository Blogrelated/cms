<?php
/**
 * @link      https://craftcms.com/
 * @copyright Copyright (c) Pixel & Tonic, Inc.
 * @license   https://craftcms.com/license
 */

namespace craft\app\models;

use Craft;
use craft\app\base\Model;

/**
 * Class CraftSupport model.
 *
 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since  3.0
 */
class CraftSupport extends Model
{
    // Properties
    // =========================================================================

    /**
     * @var string From email
     */
    public $fromEmail;

    /**
     * @var string Message
     */
    public $message;

    /**
     * @var boolean Attach logs
     */
    public $attachLogs = false;

    /**
     * @var boolean Attach db backup
     */
    public $attachDbBackup = false;

    /**
     * @var boolean Attach templates
     */
    public $attachTemplates = false;

    /**
     * @var array Attachment
     */
    public $attachment;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fromEmail' => Craft::t('app', 'Your Email'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fromEmail', 'message'], 'required'],
            [['fromEmail'], 'email'],
            [['fromEmail'], 'string', 'min' => 5, 'max' => 255],
            [['attachment'], 'file', 'maxSize' => 3145728],
        ];
    }
}