

<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * 一款可可爱爱的看板娘js的插件
 *
 * @package Live2D
 * @author Wibus
 * @version 2.0.0
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
            echo "<div id='tip'></div>";
            echo "<div class='info'>";
            echo "<h2>一款可可爱爱的Live2D Typecho插件 (" . $version . ")</h2>";

            echo "<h3>最新版本：<span style='padding: 2px 4px; background-image: linear-gradient(90deg, rgba(73, 200, 149, 1), rgba(38, 198, 218, 1)); background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgba(255, 255, 255, 1); border-width: 0.25em 0' id='ver'>获取中...</span>&nbsp;&nbsp;当前版本：<span id='now'>".$version. "</span></h3>";
            echo "<h3 style='color: rgba(255, 153, 0, 1)' id='description'></h3>";
            echo "<p>By: <a href='https://blog.iucky.cn'>Wibus</a></p>";
            echo "<p><span class='buttons'><a href='https://blog.iucky.cn/system/live2d.html'>插件说明</a></span>
            <span id='btn' class='buttons'><a id='description'>获取更新说明</a></span></p>";
            echo "<p>感谢 爆胎 的支持！</p>";
            echo "<script src='https://api.iucky.cn/plugins/update/live2d.js'></script>";
            echo "</div>";

        }
        check_update("2.0.0");


        $Json = new Typecho_Widget_Helper_Form_Element_Select(
            'Json',
            array(
                'guanbi' => '不使用JSON控制（默认）',
                'https://cdn.jsdelivr.net/npm/live2d-widget-model-shizuku@1.0.5/assets/shizuku.model.json' => 'shizuku',
                'https://cdn.jsdelivr.net/npm/live2d-widget-model-izumi@1.0.5/assets/izumi.model.json' => 'izumi',
                'https://cdn.jsdelivr.net/npm/live2d-widget-model-haru@1.0.5/01/assets/haru01.model.json' => 'haru01',
                'https://cdn.jsdelivr.net/npm/live2d-widget-model-haru@1.0.5/02/assets/haru02.model.json' => 'haru02',
                'https://cdn.jsdelivr.net/npm/live2d-widget-model-wanko@1.0.5/assets/wanko.model.json' => 'wanko',
                'https://cdn.jsdelivr.net/npm/live2d-widget-model-hijiki@1.0.5/assets/hijiki.model.json' => 'hijiki',
                'https://cdn.jsdelivr.net/npm/live2d-widget-model-koharu@1.0.5/assets/koharu.model.json' => 'koharu',
                'https://cdn.jsdelivr.net/npm/live2d-widget-model-z16@1.0.5/assets/z16.model.json' => 'z16',
                'https://cdn.jsdelivr.net/npm/live2d-widget-model-haruto@1.0.5/assets/haruto.model.json' => 'haruto',
                'https://cdn.jsdelivr.net/npm/live2d-widget-model-tororo@1.0.5/assets/tororo.model.json' => 'tororo',
                'https://cdn.jsdelivr.net/npm/live2d-widget-model-chitose@1.0.5/assets/chitose.model.json' => 'chitose',
                'https://cdn.jsdelivr.net/npm/live2d-widget-model-miku@1.0.5/assets/miku.model.json' => 'miku',
                'https://cdn.jsdelivr.net/npm/live2d-widget-model-epsilon2_1@1.0.5/assets/Epsilon2.1.model.json' => 'Epsilon2.1',
                'https://cdn.jsdelivr.net/npm/live2d-widget-model-unitychan@1.0.5/assets/unitychan.model.json' => 'unitychan',
                'https://cdn.jsdelivr.net/npm/live2d-widget-model-nico@1.0.5/assets/nico.model.json' => 'nico',
                'https://cdn.jsdelivr.net/npm/live2d-widget-model-rem@1.0.1/assets/rem.model.json' => 'rem',
                'https://cdn.jsdelivr.net/npm/live2d-widget-model-nito@1.0.5/assets/nito.model.json' => 'nito',
                'https://cdn.jsdelivr.net/npm/live2d-widget-model-nipsilon@1.0.5/assets/nipsilon.model.json' => 'nipsilon',
                'https://cdn.jsdelivr.net/npm/live2d-widget-model-ni-j@1.0.5/assets/ni-j.model.json' => 'ni-j',
                'https://cdn.jsdelivr.net/npm/live2d-widget-model-nietzsche@1.0.5/assets/nietzche.model.json' => 'nietzche',
                'https://cdn.jsdelivr.net/npm/live2d-widget-model-platelet@1.1.0/assets/platelet.model.json' => 'platelet',
                'https://cdn.jsdelivr.net/npm/live2d-widget-model-isuzu@1.0.4/assets/model.json' => 'isuzu',
                'https://cdn.jsdelivr.net/npm/live2d-widget-model-jth@1.0.0/assets/model/katou_01/katou_01.model.json' => 'katou_01',
                'https://cdn.jsdelivr.net/npm/live2d-widget-model-mikoto@1.0.0/assets/mikoto.model.json' => 'mikoto',
                'https://cdn.jsdelivr.net/npm/live2d-widget-model-mashiro-seifuku@1.0.1/assets/seifuku.model.json' => 'seifuku',
                'https://cdn.jsdelivr.net/npm/live2d-widget-model-ichigo@1.0.1/assets/ichigo.model.json' => 'ichigo',
                'https://cdn.jsdelivr.net/npm/live2d-widget-model-hk_fos@1.0.0/assets/hk416.model.json' => 'hk416',
                'https://unpkg.com/live2d-widget-model-hijiki@1.0.5/assets/hijiki.model.json' => '黑猫',
                'https://unpkg.com/live2d-widget-model-tororo@1.0.5/assets/tororo.model.json' => '白猫',
                'https://unpkg.com/live2d-widget-model-wanko@1.0.5/assets/wanko.model.json' => '狗狗'
    
            ),
            '0',
            '选择Live2D人物模型JSON（最高优先级选项）',
            '若选择了此选项，自定义JSON可以填写在下面的选项中，但其他的选项都<b>无效</b>了'
        );
        $form->addInput($Json->multiMode());

        $JsonSelf = new Typecho_Widget_Helper_Form_Element_Text(
            'JsonSelf',
            NULL,NULL,_t('自定义JSON（url格式）'),_t('可以通过自定义Json来使用除插件自带以外的不同的模型，优先级最高')
        );
        $form->addInput($JsonSelf);

        // 是否载入
        $Font = new Typecho_Widget_Helper_Form_Element_Radio(
            'Font',
            array(
                '0' => _t('是'),
                '1' => _t('否'),
            ),
            '1',
            _t('是否使用爆胎API版本（无法控制大小）'),
            _t('若您已经设置了第一个选项，则此选项<b>无效</b>')
        );
        $form->addInput($Font);

        // 是左右？
        $Sites = new Typecho_Widget_Helper_Form_Element_Radio(
            'Sites',
            array(
                'right' => _t('右边'),
                'left' => _t('左边'),
            ),
            'right',
            _t('看板娘位置'),
            _t('选择看板娘在屏幕出现的位置')
        );
        $form->addInput($Sites);

        $Width = new Typecho_Widget_Helper_Form_Element_Text(
            'Width',
            NULL,_t('160'),_t('模型宽度'),_t('默认值：160')
        );
        $form->addInput($Width);

        $Height = new Typecho_Widget_Helper_Form_Element_Text(
            'Height',
            NULL,_t('200'),_t('模型高度'),_t('默认值：200')
        );
        $form->addInput($Height);

        $mobile = new Typecho_Widget_Helper_Form_Element_Radio(
            'mobile',
            array(
                'false' => _t('不显示'),
                'ture' => _t('显示'),
            ),
            'false',
            _t('是否在手机端显示'),
            _t('请注意，此选项有可能会导致手机端掉帧！')
        );
        $form->addInput($mobile);

        $hOffset = new Typecho_Widget_Helper_Form_Element_Text(
            'hOffset',
            NULL,_t('70'),_t('模型水平偏移值'),_t('默认值：70')
        );
        $form->addInput($hOffset);
        $hOffset = new Typecho_Widget_Helper_Form_Element_Text(
            'hOffset',
            NULL,_t('70'),_t('模型水平偏移值'),_t('默认值：70')
        );
        $form->addInput($hOffset);
        $vOffset = new Typecho_Widget_Helper_Form_Element_Text(
            'vOffset',
            NULL,_t('0'),_t('模型垂直偏移值'),_t('默认值：0')
        );
        $form->addInput($hOffset);
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
        $Jsonn = $options->plugin('Live2D')->Json;
        $JsonSelf = $options->plugin('Live2D')->JsonSelf;
        $Width = $options->plugin('Live2D')->Width;
        $Height = $options->plugin('Live2D')->Height;
        $mobile = $options->plugin('Live2D')->mobile;
        $hOffset = $options->plugin('Live2D')->hOffset;
        $vOffset = $options->plugin('Live2D')->vOffset;
        if ($JsonSelf){
            $Json = $JsonSelf;
        }else{
            $Json = $Jsonn;
        }
        if ($Jsonn == 'guanbi'){
            echo 'console.log(\'off\')';
            if ($Font == 0) { //开启爆胎API
                echo "<!--Live2D依赖-->";
                echo '<link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">';
                if ($Sites == 'right') { 
                    echo"<script src='//api.itggg.cn/liive2d/autoload.js'></script>";
                } else {
                    echo"<script src='//api.itggg.cn/live2d/autoload.js'></script>";
                }
            }
        }else{
            echo '<script src="https://cdn.jsdelivr.net/npm/live2d-widget@3.1.4/lib/L2Dwidget.min.js"></script>';
            echo "<script>			
            L2Dwidget.init({
				model: {
					jsonPath: '".$Json."',
					scale: 1
				},
				mobile: {
					show: ".$mobile."
				},
				display: {
					position: '".$Sites."',
					width: ".$Width.",
					height: ".$Height.",
					hOffset: ".$hOffset.",
					vOffset: ".$vOffset."
				}
			})</script>";

        }
        echo '<script type="text/javascript">
        console.log("\n %c Live2D插件 %c by Wibus | https://blog.iucky.cn ", "color:#444;background:#eee;padding:5px 0;", "color:#eee;background:#444;padding:5px 0;");
        </script>';
        echo"  
        ";
    }






}
