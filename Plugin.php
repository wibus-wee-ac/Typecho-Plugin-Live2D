<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * 一款基于爆胎看板娘js的插件
 *
 * @package Live2D
 * @author Wibus
 * @version 1.0.0
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
            echo "<h2>基于爆胎看板娘js 的 插件 (" . $version . ")</h2>";
            echo "<p>By: <a href='https://blog.iucky.cn'>Wibus</a></p>";
            echo "<p class='buttons'><a href='https://blog.iucky.cn/Y-disk/32.html'>插件说明</a>";
            echo "<p>感谢 爆胎 的大力支持！</p>";

            echo "</div>";
        }
        check_update("1.0.0");

        // 是否载入Font
        $Font = new Typecho_Widget_Helper_Form_Element_Radio(
            'Font',
            array(
                '0' => _t('否'),
                '1' => _t('是'),
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
                '0' => _t('左边'),
                '1' => _t('右边'),
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
        if ($Font) { //开启font
            echo"<link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css\">";
        } else {

        }
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
        $options = Helper::options();
        $Font = $options->plugin('Live2D')->Font;
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

       
        if ($Sites) { 
            echo"<script src=\"//api.itggg.cn/liive2d/autoload.js\"></script>";
        } else {
            echo"<script src=\"//api.itggg.cn/live2d/autoload.js\"></script>";
        }
        echo '<script type="text/javascript">
        console.log("\n %c Live2D插件 %c by Wibus | https://blog.iucky.cn ", "color:#444;background:#eee;padding:5px 0;", "color:#eee;background:#444;padding:5px 0;");
        </script>';
        echo"  
        ";
    }
}
