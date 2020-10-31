

<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * 一款基于爆胎看板娘js的插件
 *
 * @package Live2D
 * @author Wibus
 * @version 1.1.0
 * @link https://blog.iucky.cn
 */

class Live2D_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     *
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
        Typecho_Plugin::factory('Widget_Archive')->footer = array(__CLASS__, 'footer');
        return "Live2D插件启动成功，请进入插件设置进行简单配置！";
    }
    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     *
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate()
    {
        return "Live2D插件禁用成功";
    }
    /**
     * 获取插件配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form)
    {

        // 插件信息与更新检测
        function check_update($version)
        {

            echo "<style>.info{text-align:center; margin:20px 0;} .info > *{margin:0 0 15px} .buttons a{background:#467b96; color:#fff; border-radius:4px; padding: 8px 10px; display:inline-block;}.buttons a+a{margin-left:10px}</style>";
            echo "<div class='info'>";
            echo "<h2>一款基于爆胎看板娘js的Live2D Typecho插件 (" . $version . ")</h2>";

            echo "<h3>最新版本：<span style='padding: 2px 4px; background-image: linear-gradient(90deg, rgba(73, 200, 149, 1), rgba(38, 198, 218, 1)); background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgba(255, 255, 255, 1); border-width: 0.25em 0' id='ver'>获取中...</span>&nbsp;&nbsp;当前版本：".$version. "</h3>";
            echo "<h3 style='color: rgba(255, 153, 0, 1)' id='description'></h3>";
            echo "<p>By: <a href='https://blog.iucky.cn'>Wibus</a></p>";
            echo "<p><span class='buttons'><a href='https://blog.iucky.cn/system/live2d.html'>插件说明</a></span>
            <span id='btn' class='buttons'><a id='description'>获取更新说明</a></span></p>";
            echo "<p>感谢 爆胎 的大力支持！</p>";
            echo "<script src='https://api.iucky.cn/plugins/update/live2d.js'></script>";

            echo "</div>";
        }
        check_update("1.1.0");

        // 是否载入Font
        $Font = new Typecho_Widget_Helper_Form_Element_Radio(
            'Font',
            array(
                '0' => _t('是'),
                '1' => _t('否'),
            ),
            '1',
            _t('是否引入FontAwesome 4.7.0'),
            _t('如果网页中已经加载了任何版本的Font Awesome就不要重复加载了')
        );
        $form->addInput($Font);

        // 是左右？
        $Sites = new Typecho_Widget_Helper_Form_Element_Radio(
            'Sites',
            array(
                '0' => _t('右边'),
                '1' => _t('左边'),
            ),
            '0',
            _t('看板娘位置'),
            _t('选择看板娘在屏幕出现的位置')
        );
        $form->addInput($Sites);
    }
    /**
     * 个人用户的配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form)
    {

    }

    /**
     * 页头输出相关代码
     *
     * @access public
     * @param unknown render
     * @return unknown
     */
    public static function header()
    {

        
    }

    /**
     * 页脚输出相关代码
     *
     * @access public
     * @param unknown render
     * @return unknown
     */
    public static function footer()
    {
        //  获取用户配置
        $options = Helper::options();
        $Sites = $options->plugin('Live2D')->Sites;
        $Font = $options->plugin('Live2D')->Font;
        if ($Font == 0) { //开启font
            echo "<!--Live2D依赖-->";
            echo '<link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">';
        }elseif ($Font == 1) {
            echo "<!--Live2D未引入font-->";
        }
        if ($Sites) { 
            echo"<script src='//api.itggg.cn/liive2d/autoload.js'></script>";
        } else {
            echo"<script src='//api.itggg.cn/live2d/autoload.js'></script>";
        }
        echo '<script type="text/javascript">
        console.log("\n %c Live2D插件 %c by Wibus | https://blog.iucky.cn ", "color:#444;background:#eee;padding:5px 0;", "color:#eee;background:#444;padding:5px 0;");
        </script>';
        echo"  
        ";
    }






}
