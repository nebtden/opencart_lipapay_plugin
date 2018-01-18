<?php

/* install/step_2.twig */
class __TwigTemplate_ed8082c7c712379290a65faa26aec6deba4b0d136fa459223760aa81b520ac3f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo (isset($context["header"]) ? $context["header"] : null);
        echo "
<div class=\"container\">
  <header>
    <div class=\"row\">
      <div class=\"col-sm-6\">
        <h1 class=\"pull-left\">2
          <small>/4</small>
        </h1>
        <h3>";
        // line 9
        echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
        echo "
          <br>
          <small>";
        // line 11
        echo (isset($context["text_step_2"]) ? $context["text_step_2"] : null);
        echo "</small>
        </h3>
      </div>
      <div class=\"col-sm-6\">
        <div id=\"logo\" class=\"pull-right hidden-xs\"><img src=\"view/image/logo.png\" alt=\"OpenCart\" title=\"OpenCart\"/></div>
      </div>
    </div>
  </header>
  ";
        // line 19
        if ((isset($context["error_warning"]) ? $context["error_warning"] : null)) {
            // line 20
            echo "    <div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo (isset($context["error_warning"]) ? $context["error_warning"] : null);
            echo "
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
    </div>
  ";
        }
        // line 24
        echo "  <div class=\"row\">
    <div class=\"col-sm-9\">
      <form action=\"";
        // line 26
        echo (isset($context["action"]) ? $context["action"] : null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\">
        <p>";
        // line 27
        echo (isset($context["text_install_php"]) ? $context["text_install_php"] : null);
        echo "</p>
        <fieldset>
          <table class=\"table\">
            <thead>
              <tr>
                <td width=\"35%\"><b>";
        // line 32
        echo (isset($context["text_setting"]) ? $context["text_setting"] : null);
        echo "</b></td>
                <td width=\"25%\"><b>";
        // line 33
        echo (isset($context["text_current"]) ? $context["text_current"] : null);
        echo "</b></td>
                <td width=\"25%\"><b>";
        // line 34
        echo (isset($context["text_required"]) ? $context["text_required"] : null);
        echo "</b></td>
                <td width=\"15%\" class=\"text-center\"><b>";
        // line 35
        echo (isset($context["text_status"]) ? $context["text_status"] : null);
        echo "</b></td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>";
        // line 40
        echo (isset($context["text_version"]) ? $context["text_version"] : null);
        echo "</td>
                <td>";
        // line 41
        echo (isset($context["php_version"]) ? $context["php_version"] : null);
        echo "</td>
                <td>5.4+</td>
                <td class=\"text-center\">";
        // line 43
        if (((isset($context["php_version"]) ? $context["php_version"] : null) >= "5.4")) {
            // line 44
            echo "                    <span class=\"text-success\"><i class=\"fa fa-check-circle\"></i></span>
                  ";
        } else {
            // line 46
            echo "                    <span class=\"text-danger\"><i class=\"fa fa-minus-circle\"></i></span>
                  ";
        }
        // line 47
        echo "</td>
              </tr>
              <tr>
                <td>";
        // line 50
        echo (isset($context["text_global"]) ? $context["text_global"] : null);
        echo "</td>
                <td>";
        // line 51
        if ((isset($context["register_globals"]) ? $context["register_globals"] : null)) {
            // line 52
            echo "                    ";
            echo (isset($context["text_on"]) ? $context["text_on"] : null);
            echo "
                  ";
        } else {
            // line 54
            echo "                    ";
            echo (isset($context["text_off"]) ? $context["text_off"] : null);
            echo "
                  ";
        }
        // line 55
        echo "</td>
                <td>";
        // line 56
        echo (isset($context["text_off"]) ? $context["text_off"] : null);
        echo "</td>
                <td class=\"text-center\">";
        // line 57
        if ( !(isset($context["register_globals"]) ? $context["register_globals"] : null)) {
            // line 58
            echo "                    <span class=\"text-success\"><i class=\"fa fa-check-circle\"></i></span>
                  ";
        } else {
            // line 60
            echo "                    <span class=\"text-danger\"><i class=\"fa fa-minus-circle\"></i></span>
                  ";
        }
        // line 61
        echo "</td>
              </tr>
              <tr>
                <td>";
        // line 64
        echo (isset($context["text_magic"]) ? $context["text_magic"] : null);
        echo "</td>
                <td>";
        // line 65
        if ((isset($context["magic_quotes_gpc"]) ? $context["magic_quotes_gpc"] : null)) {
            // line 66
            echo "                    ";
            echo (isset($context["text_on"]) ? $context["text_on"] : null);
            echo "
                  ";
        } else {
            // line 68
            echo "                    ";
            echo (isset($context["text_off"]) ? $context["text_off"] : null);
            echo "
                  ";
        }
        // line 69
        echo "</td>
                <td>";
        // line 70
        echo (isset($context["text_off"]) ? $context["text_off"] : null);
        echo "</td>
                <td class=\"text-center\">";
        // line 71
        if ( !(isset($context["error_magic_quotes_gpc"]) ? $context["error_magic_quotes_gpc"] : null)) {
            // line 72
            echo "                    <span class=\"text-success\"><i class=\"fa fa-check-circle\"></i></span>
                  ";
        } else {
            // line 74
            echo "                    <span class=\"text-danger\"><i class=\"fa fa-minus-circle\"></i></span>
                  ";
        }
        // line 75
        echo "</td>
              </tr>
              <tr>
                <td>";
        // line 78
        echo (isset($context["text_file_upload"]) ? $context["text_file_upload"] : null);
        echo "</td>
                <td>";
        // line 79
        if ((isset($context["file_uploads"]) ? $context["file_uploads"] : null)) {
            // line 80
            echo "                    ";
            echo (isset($context["text_on"]) ? $context["text_on"] : null);
            echo "
                  ";
        } else {
            // line 82
            echo "                    ";
            echo (isset($context["text_off"]) ? $context["text_off"] : null);
            echo "
                  ";
        }
        // line 83
        echo "</td>
                <td>";
        // line 84
        echo (isset($context["text_on"]) ? $context["text_on"] : null);
        echo "</td>
                <td class=\"text-center\">";
        // line 85
        if ((isset($context["file_uploads"]) ? $context["file_uploads"] : null)) {
            // line 86
            echo "                    <span class=\"text-success\"><i class=\"fa fa-check-circle\"></i></span>
                  ";
        } else {
            // line 88
            echo "                    <span class=\"text-danger\"><i class=\"fa fa-minus-circle\"></i></span>
                  ";
        }
        // line 89
        echo "</td>
              </tr>
              <tr>
                <td>";
        // line 92
        echo (isset($context["text_session"]) ? $context["text_session"] : null);
        echo "</td>
                <td>";
        // line 93
        if ((isset($context["session_auto_start"]) ? $context["session_auto_start"] : null)) {
            // line 94
            echo "                    ";
            echo (isset($context["text_on"]) ? $context["text_on"] : null);
            echo "
                  ";
        } else {
            // line 96
            echo "                    ";
            echo (isset($context["text_off"]) ? $context["text_off"] : null);
            echo "
                  ";
        }
        // line 97
        echo "</td>
                <td>";
        // line 98
        echo (isset($context["text_off"]) ? $context["text_off"] : null);
        echo "</td>
                <td class=\"text-center\">";
        // line 99
        if ( !(isset($context["session_auto_start"]) ? $context["session_auto_start"] : null)) {
            // line 100
            echo "                    <span class=\"text-success\"><i class=\"fa fa-check-circle\"></i></span>
                  ";
        } else {
            // line 102
            echo "                    <span class=\"text-danger\"><i class=\"fa fa-minus-circle\"></i></span>
                  ";
        }
        // line 103
        echo "</td>
              </tr>
            </tbody>
          </table>
        </fieldset>
        <p>";
        // line 108
        echo (isset($context["text_install_extension"]) ? $context["text_install_extension"] : null);
        echo "</p>
        <fieldset>
          <table class=\"table\">
            <thead>
              <tr>
                <td width=\"35%\"><b>";
        // line 113
        echo (isset($context["text_extension"]) ? $context["text_extension"] : null);
        echo "</b></td>
                <td width=\"25%\"><b>";
        // line 114
        echo (isset($context["text_current"]) ? $context["text_current"] : null);
        echo "</b></td>
                <td width=\"25%\"><b>";
        // line 115
        echo (isset($context["text_required"]) ? $context["text_required"] : null);
        echo "</b></td>
                <td width=\"15%\" class=\"text-center\"><b>";
        // line 116
        echo (isset($context["text_status"]) ? $context["text_status"] : null);
        echo "</b></td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>";
        // line 121
        echo (isset($context["text_db"]) ? $context["text_db"] : null);
        echo "</td>
                <td>";
        // line 122
        if ((isset($context["db"]) ? $context["db"] : null)) {
            // line 123
            echo "                    ";
            echo (isset($context["text_on"]) ? $context["text_on"] : null);
            echo "
                  ";
        } else {
            // line 125
            echo "                    ";
            echo (isset($context["text_off"]) ? $context["text_off"] : null);
            echo "
                  ";
        }
        // line 126
        echo "</td>
                <td>";
        // line 127
        echo (isset($context["text_on"]) ? $context["text_on"] : null);
        echo "</td>
                <td class=\"text-center\">";
        // line 128
        if ((isset($context["db"]) ? $context["db"] : null)) {
            // line 129
            echo "                    <span class=\"text-success\"><i class=\"fa fa-check-circle\"></i></span>
                  ";
        } else {
            // line 131
            echo "                    <span class=\"text-danger\"><i class=\"fa fa-minus-circle\"></i></span>
                  ";
        }
        // line 132
        echo "</td>
              </tr>
              <tr>
                <td>";
        // line 135
        echo (isset($context["text_gd"]) ? $context["text_gd"] : null);
        echo "</td>
                <td>";
        // line 136
        if ((isset($context["gd"]) ? $context["gd"] : null)) {
            // line 137
            echo "                    ";
            echo (isset($context["text_on"]) ? $context["text_on"] : null);
            echo "
                  ";
        } else {
            // line 139
            echo "                    ";
            echo (isset($context["text_off"]) ? $context["text_off"] : null);
            echo "
                  ";
        }
        // line 140
        echo "</td>
                <td>";
        // line 141
        echo (isset($context["text_on"]) ? $context["text_on"] : null);
        echo "</td>
                <td class=\"text-center\">";
        // line 142
        if ((isset($context["gd"]) ? $context["gd"] : null)) {
            // line 143
            echo "                    <span class=\"text-success\"><i class=\"fa fa-check-circle\"></i></span>
                  ";
        } else {
            // line 145
            echo "                    <span class=\"text-danger\"><i class=\"fa fa-minus-circle\"></i></span>
                  ";
        }
        // line 146
        echo "</td>
              </tr>
              <tr>
                <td>";
        // line 149
        echo (isset($context["text_curl"]) ? $context["text_curl"] : null);
        echo "</td>
                <td>";
        // line 150
        if ((isset($context["curl"]) ? $context["curl"] : null)) {
            // line 151
            echo "                    ";
            echo (isset($context["text_on"]) ? $context["text_on"] : null);
            echo "
                  ";
        } else {
            // line 153
            echo "                    ";
            echo (isset($context["text_off"]) ? $context["text_off"] : null);
            echo "
                  ";
        }
        // line 154
        echo "</td>
                <td>";
        // line 155
        echo (isset($context["text_on"]) ? $context["text_on"] : null);
        echo "</td>
                <td class=\"text-center\">";
        // line 156
        if ((isset($context["curl"]) ? $context["curl"] : null)) {
            // line 157
            echo "                    <span class=\"text-success\"><i class=\"fa fa-check-circle\"></i></span>
                  ";
        } else {
            // line 159
            echo "                    <span class=\"text-danger\"><i class=\"fa fa-minus-circle\"></i></span>
                  ";
        }
        // line 160
        echo "</td>
              </tr>
              <tr>
                <td>";
        // line 163
        echo (isset($context["text_openssl"]) ? $context["text_openssl"] : null);
        echo "</td>
                <td>";
        // line 164
        if ((isset($context["openssl"]) ? $context["openssl"] : null)) {
            // line 165
            echo "                    ";
            echo (isset($context["text_on"]) ? $context["text_on"] : null);
            echo "
                  ";
        } else {
            // line 167
            echo "                    ";
            echo (isset($context["text_off"]) ? $context["text_off"] : null);
            echo "
                  ";
        }
        // line 168
        echo "</td>
                <td>";
        // line 169
        echo (isset($context["text_on"]) ? $context["text_on"] : null);
        echo "</td>
                <td class=\"text-center\">";
        // line 170
        if ((isset($context["openssl"]) ? $context["openssl"] : null)) {
            // line 171
            echo "                    <span class=\"text-success\"><i class=\"fa fa-check-circle\"></i></span>
                  ";
        } else {
            // line 173
            echo "                    <span class=\"text-danger\"><i class=\"fa fa-minus-circle\"></i></span>
                  ";
        }
        // line 174
        echo "</td>
              </tr>
              <tr>
                <td>";
        // line 177
        echo (isset($context["text_zlib"]) ? $context["text_zlib"] : null);
        echo "</td>
                <td>";
        // line 178
        if ((isset($context["zlib"]) ? $context["zlib"] : null)) {
            // line 179
            echo "                    ";
            echo (isset($context["text_on"]) ? $context["text_on"] : null);
            echo "
                  ";
        } else {
            // line 181
            echo "                    ";
            echo (isset($context["text_off"]) ? $context["text_off"] : null);
            echo "
                  ";
        }
        // line 182
        echo "</td>
                <td>";
        // line 183
        echo (isset($context["text_on"]) ? $context["text_on"] : null);
        echo "</td>
                <td class=\"text-center\">";
        // line 184
        if ((isset($context["zlib"]) ? $context["zlib"] : null)) {
            // line 185
            echo "                    <span class=\"text-success\"><i class=\"fa fa-check-circle\"></i></span>
                  ";
        } else {
            // line 187
            echo "                    <span class=\"text-danger\"><i class=\"fa fa-minus-circle\"></i></span>
                  ";
        }
        // line 188
        echo "</td>
              </tr>
              <tr>
                <td>";
        // line 191
        echo (isset($context["text_zip"]) ? $context["text_zip"] : null);
        echo "</td>
                <td>";
        // line 192
        if ((isset($context["zip"]) ? $context["zip"] : null)) {
            // line 193
            echo "                    ";
            echo (isset($context["text_on"]) ? $context["text_on"] : null);
            echo "
                  ";
        } else {
            // line 195
            echo "                    ";
            echo (isset($context["text_off"]) ? $context["text_off"] : null);
            echo "
                  ";
        }
        // line 196
        echo "</td>
                <td>";
        // line 197
        echo (isset($context["text_on"]) ? $context["text_on"] : null);
        echo "</td>
                <td class=\"text-center\">";
        // line 198
        if ((isset($context["zip"]) ? $context["zip"] : null)) {
            // line 199
            echo "                    <span class=\"text-success\"><i class=\"fa fa-check-circle\"></i></span>
                  ";
        } else {
            // line 201
            echo "                    <span class=\"text-danger\"><i class=\"fa fa-minus-circle\"></i></span>
                  ";
        }
        // line 202
        echo "</td>
              </tr>
              ";
        // line 204
        if ( !(isset($context["iconv"]) ? $context["iconv"] : null)) {
            // line 205
            echo "                <tr>
                  <td>";
            // line 206
            echo (isset($context["text_mbstring"]) ? $context["text_mbstring"] : null);
            echo "</td>
                  <td>";
            // line 207
            if ((isset($context["mbstring"]) ? $context["mbstring"] : null)) {
                // line 208
                echo "                      ";
                echo (isset($context["text_on"]) ? $context["text_on"] : null);
                echo "
                    ";
            } else {
                // line 210
                echo "                      ";
                echo (isset($context["text_off"]) ? $context["text_off"] : null);
                echo "
                    ";
            }
            // line 211
            echo "</td>
                  <td>";
            // line 212
            echo (isset($context["text_on"]) ? $context["text_on"] : null);
            echo "</td>
                  <td class=\"text-center\">";
            // line 213
            if ((isset($context["mbstring"]) ? $context["mbstring"] : null)) {
                // line 214
                echo "                      <span class=\"text-success\"><i class=\"fa fa-check-circle\"></i></span>
                    ";
            } else {
                // line 216
                echo "                      <span class=\"text-danger\"><i class=\"fa fa-minus-circle\"></i></span>
                    ";
            }
            // line 217
            echo "</td>
                </tr>
              ";
        }
        // line 220
        echo "            </tbody>
          </table>
        </fieldset>
        <p>";
        // line 223
        echo (isset($context["text_install_file"]) ? $context["text_install_file"] : null);
        echo "</p>
        <fieldset>
          <table class=\"table\">
            <thead>
              <tr>
                <td><b>";
        // line 228
        echo (isset($context["text_file"]) ? $context["text_file"] : null);
        echo "</b></td>
                <td><b>";
        // line 229
        echo (isset($context["text_status"]) ? $context["text_status"] : null);
        echo "</b></td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>";
        // line 234
        echo (isset($context["catalog_config"]) ? $context["catalog_config"] : null);
        echo "</td>
                <td>";
        // line 235
        if ( !(isset($context["error_catalog_config"]) ? $context["error_catalog_config"] : null)) {
            // line 236
            echo "                    <span class=\"text-success\">";
            echo (isset($context["text_writable"]) ? $context["text_writable"] : null);
            echo "</span>
                  ";
        } else {
            // line 238
            echo "                    <span class=\"text-danger\">";
            echo (isset($context["error_catalog_config"]) ? $context["error_catalog_config"] : null);
            echo "</span>
                  ";
        }
        // line 239
        echo "</td>
              </tr>
              <tr>
                <td>";
        // line 242
        echo (isset($context["admin_config"]) ? $context["admin_config"] : null);
        echo "</td>
                <td>";
        // line 243
        if ( !(isset($context["error_admin_config"]) ? $context["error_admin_config"] : null)) {
            // line 244
            echo "                    <span class=\"text-success\">";
            echo (isset($context["text_writable"]) ? $context["text_writable"] : null);
            echo "</span>
                  ";
        } else {
            // line 246
            echo "                    <span class=\"text-danger\">";
            echo (isset($context["error_admin_config"]) ? $context["error_admin_config"] : null);
            echo "</span>
                  ";
        }
        // line 247
        echo "</td>
              </tr>
            </tbody>
          </table>
        </fieldset>
        <div class=\"buttons\">
          <div class=\"pull-left\"><a href=\"";
        // line 253
        echo (isset($context["back"]) ? $context["back"] : null);
        echo "\" class=\"btn btn-default\">";
        echo (isset($context["button_back"]) ? $context["button_back"] : null);
        echo "</a></div>
          <div class=\"pull-right\">
            <input type=\"submit\" value=\"";
        // line 255
        echo (isset($context["button_continue"]) ? $context["button_continue"] : null);
        echo "\" class=\"btn btn-primary\"/>
          </div>
        </div>
      </form>
    </div>
    <div class=\"col-sm-3\">";
        // line 260
        echo (isset($context["column_left"]) ? $context["column_left"] : null);
        echo "</div>
  </div>
</div>
";
        // line 263
        echo (isset($context["footer"]) ? $context["footer"] : null);
    }

    public function getTemplateName()
    {
        return "install/step_2.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  685 => 263,  679 => 260,  671 => 255,  664 => 253,  656 => 247,  650 => 246,  644 => 244,  642 => 243,  638 => 242,  633 => 239,  627 => 238,  621 => 236,  619 => 235,  615 => 234,  607 => 229,  603 => 228,  595 => 223,  590 => 220,  585 => 217,  581 => 216,  577 => 214,  575 => 213,  571 => 212,  568 => 211,  562 => 210,  556 => 208,  554 => 207,  550 => 206,  547 => 205,  545 => 204,  541 => 202,  537 => 201,  533 => 199,  531 => 198,  527 => 197,  524 => 196,  518 => 195,  512 => 193,  510 => 192,  506 => 191,  501 => 188,  497 => 187,  493 => 185,  491 => 184,  487 => 183,  484 => 182,  478 => 181,  472 => 179,  470 => 178,  466 => 177,  461 => 174,  457 => 173,  453 => 171,  451 => 170,  447 => 169,  444 => 168,  438 => 167,  432 => 165,  430 => 164,  426 => 163,  421 => 160,  417 => 159,  413 => 157,  411 => 156,  407 => 155,  404 => 154,  398 => 153,  392 => 151,  390 => 150,  386 => 149,  381 => 146,  377 => 145,  373 => 143,  371 => 142,  367 => 141,  364 => 140,  358 => 139,  352 => 137,  350 => 136,  346 => 135,  341 => 132,  337 => 131,  333 => 129,  331 => 128,  327 => 127,  324 => 126,  318 => 125,  312 => 123,  310 => 122,  306 => 121,  298 => 116,  294 => 115,  290 => 114,  286 => 113,  278 => 108,  271 => 103,  267 => 102,  263 => 100,  261 => 99,  257 => 98,  254 => 97,  248 => 96,  242 => 94,  240 => 93,  236 => 92,  231 => 89,  227 => 88,  223 => 86,  221 => 85,  217 => 84,  214 => 83,  208 => 82,  202 => 80,  200 => 79,  196 => 78,  191 => 75,  187 => 74,  183 => 72,  181 => 71,  177 => 70,  174 => 69,  168 => 68,  162 => 66,  160 => 65,  156 => 64,  151 => 61,  147 => 60,  143 => 58,  141 => 57,  137 => 56,  134 => 55,  128 => 54,  122 => 52,  120 => 51,  116 => 50,  111 => 47,  107 => 46,  103 => 44,  101 => 43,  96 => 41,  92 => 40,  84 => 35,  80 => 34,  76 => 33,  72 => 32,  64 => 27,  60 => 26,  56 => 24,  48 => 20,  46 => 19,  35 => 11,  30 => 9,  19 => 1,);
    }
}
/* {{ header }}*/
/* <div class="container">*/
/*   <header>*/
/*     <div class="row">*/
/*       <div class="col-sm-6">*/
/*         <h1 class="pull-left">2*/
/*           <small>/4</small>*/
/*         </h1>*/
/*         <h3>{{ heading_title }}*/
/*           <br>*/
/*           <small>{{ text_step_2 }}</small>*/
/*         </h3>*/
/*       </div>*/
/*       <div class="col-sm-6">*/
/*         <div id="logo" class="pull-right hidden-xs"><img src="view/image/logo.png" alt="OpenCart" title="OpenCart"/></div>*/
/*       </div>*/
/*     </div>*/
/*   </header>*/
/*   {% if error_warning %}*/
/*     <div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> {{ error_warning }}*/
/*       <button type="button" class="close" data-dismiss="alert">&times;</button>*/
/*     </div>*/
/*   {% endif %}*/
/*   <div class="row">*/
/*     <div class="col-sm-9">*/
/*       <form action="{{ action }}" method="post" enctype="multipart/form-data">*/
/*         <p>{{ text_install_php }}</p>*/
/*         <fieldset>*/
/*           <table class="table">*/
/*             <thead>*/
/*               <tr>*/
/*                 <td width="35%"><b>{{ text_setting }}</b></td>*/
/*                 <td width="25%"><b>{{ text_current }}</b></td>*/
/*                 <td width="25%"><b>{{ text_required }}</b></td>*/
/*                 <td width="15%" class="text-center"><b>{{ text_status }}</b></td>*/
/*               </tr>*/
/*             </thead>*/
/*             <tbody>*/
/*               <tr>*/
/*                 <td>{{ text_version }}</td>*/
/*                 <td>{{ php_version }}</td>*/
/*                 <td>5.4+</td>*/
/*                 <td class="text-center">{% if php_version >= '5.4' %}*/
/*                     <span class="text-success"><i class="fa fa-check-circle"></i></span>*/
/*                   {% else %}*/
/*                     <span class="text-danger"><i class="fa fa-minus-circle"></i></span>*/
/*                   {% endif %}</td>*/
/*               </tr>*/
/*               <tr>*/
/*                 <td>{{ text_global }}</td>*/
/*                 <td>{% if register_globals %}*/
/*                     {{ text_on }}*/
/*                   {% else %}*/
/*                     {{ text_off }}*/
/*                   {% endif %}</td>*/
/*                 <td>{{ text_off }}</td>*/
/*                 <td class="text-center">{% if not register_globals %}*/
/*                     <span class="text-success"><i class="fa fa-check-circle"></i></span>*/
/*                   {% else %}*/
/*                     <span class="text-danger"><i class="fa fa-minus-circle"></i></span>*/
/*                   {% endif %}</td>*/
/*               </tr>*/
/*               <tr>*/
/*                 <td>{{ text_magic }}</td>*/
/*                 <td>{% if magic_quotes_gpc %}*/
/*                     {{ text_on }}*/
/*                   {% else %}*/
/*                     {{ text_off }}*/
/*                   {% endif %}</td>*/
/*                 <td>{{ text_off }}</td>*/
/*                 <td class="text-center">{% if not error_magic_quotes_gpc %}*/
/*                     <span class="text-success"><i class="fa fa-check-circle"></i></span>*/
/*                   {% else %}*/
/*                     <span class="text-danger"><i class="fa fa-minus-circle"></i></span>*/
/*                   {% endif %}</td>*/
/*               </tr>*/
/*               <tr>*/
/*                 <td>{{ text_file_upload }}</td>*/
/*                 <td>{% if file_uploads %}*/
/*                     {{ text_on }}*/
/*                   {% else %}*/
/*                     {{ text_off }}*/
/*                   {% endif %}</td>*/
/*                 <td>{{ text_on }}</td>*/
/*                 <td class="text-center">{% if file_uploads %}*/
/*                     <span class="text-success"><i class="fa fa-check-circle"></i></span>*/
/*                   {% else %}*/
/*                     <span class="text-danger"><i class="fa fa-minus-circle"></i></span>*/
/*                   {% endif %}</td>*/
/*               </tr>*/
/*               <tr>*/
/*                 <td>{{ text_session }}</td>*/
/*                 <td>{% if session_auto_start %}*/
/*                     {{ text_on }}*/
/*                   {% else %}*/
/*                     {{ text_off }}*/
/*                   {% endif %}</td>*/
/*                 <td>{{ text_off }}</td>*/
/*                 <td class="text-center">{% if not session_auto_start %}*/
/*                     <span class="text-success"><i class="fa fa-check-circle"></i></span>*/
/*                   {% else %}*/
/*                     <span class="text-danger"><i class="fa fa-minus-circle"></i></span>*/
/*                   {% endif %}</td>*/
/*               </tr>*/
/*             </tbody>*/
/*           </table>*/
/*         </fieldset>*/
/*         <p>{{ text_install_extension }}</p>*/
/*         <fieldset>*/
/*           <table class="table">*/
/*             <thead>*/
/*               <tr>*/
/*                 <td width="35%"><b>{{ text_extension }}</b></td>*/
/*                 <td width="25%"><b>{{ text_current }}</b></td>*/
/*                 <td width="25%"><b>{{ text_required }}</b></td>*/
/*                 <td width="15%" class="text-center"><b>{{ text_status }}</b></td>*/
/*               </tr>*/
/*             </thead>*/
/*             <tbody>*/
/*               <tr>*/
/*                 <td>{{ text_db }}</td>*/
/*                 <td>{% if db %}*/
/*                     {{ text_on }}*/
/*                   {% else %}*/
/*                     {{ text_off }}*/
/*                   {% endif %}</td>*/
/*                 <td>{{ text_on }}</td>*/
/*                 <td class="text-center">{% if db %}*/
/*                     <span class="text-success"><i class="fa fa-check-circle"></i></span>*/
/*                   {% else %}*/
/*                     <span class="text-danger"><i class="fa fa-minus-circle"></i></span>*/
/*                   {% endif %}</td>*/
/*               </tr>*/
/*               <tr>*/
/*                 <td>{{ text_gd }}</td>*/
/*                 <td>{% if gd %}*/
/*                     {{ text_on }}*/
/*                   {% else %}*/
/*                     {{ text_off }}*/
/*                   {% endif %}</td>*/
/*                 <td>{{ text_on }}</td>*/
/*                 <td class="text-center">{% if gd %}*/
/*                     <span class="text-success"><i class="fa fa-check-circle"></i></span>*/
/*                   {% else %}*/
/*                     <span class="text-danger"><i class="fa fa-minus-circle"></i></span>*/
/*                   {% endif %}</td>*/
/*               </tr>*/
/*               <tr>*/
/*                 <td>{{ text_curl }}</td>*/
/*                 <td>{% if curl %}*/
/*                     {{ text_on }}*/
/*                   {% else %}*/
/*                     {{ text_off }}*/
/*                   {% endif %}</td>*/
/*                 <td>{{ text_on }}</td>*/
/*                 <td class="text-center">{% if curl %}*/
/*                     <span class="text-success"><i class="fa fa-check-circle"></i></span>*/
/*                   {% else %}*/
/*                     <span class="text-danger"><i class="fa fa-minus-circle"></i></span>*/
/*                   {% endif %}</td>*/
/*               </tr>*/
/*               <tr>*/
/*                 <td>{{ text_openssl }}</td>*/
/*                 <td>{% if openssl %}*/
/*                     {{ text_on }}*/
/*                   {% else %}*/
/*                     {{ text_off }}*/
/*                   {% endif %}</td>*/
/*                 <td>{{ text_on }}</td>*/
/*                 <td class="text-center">{% if openssl %}*/
/*                     <span class="text-success"><i class="fa fa-check-circle"></i></span>*/
/*                   {% else %}*/
/*                     <span class="text-danger"><i class="fa fa-minus-circle"></i></span>*/
/*                   {% endif %}</td>*/
/*               </tr>*/
/*               <tr>*/
/*                 <td>{{ text_zlib }}</td>*/
/*                 <td>{% if zlib %}*/
/*                     {{ text_on }}*/
/*                   {% else %}*/
/*                     {{ text_off }}*/
/*                   {% endif %}</td>*/
/*                 <td>{{ text_on }}</td>*/
/*                 <td class="text-center">{% if zlib %}*/
/*                     <span class="text-success"><i class="fa fa-check-circle"></i></span>*/
/*                   {% else %}*/
/*                     <span class="text-danger"><i class="fa fa-minus-circle"></i></span>*/
/*                   {% endif %}</td>*/
/*               </tr>*/
/*               <tr>*/
/*                 <td>{{ text_zip }}</td>*/
/*                 <td>{% if zip %}*/
/*                     {{ text_on }}*/
/*                   {% else %}*/
/*                     {{ text_off }}*/
/*                   {% endif %}</td>*/
/*                 <td>{{ text_on }}</td>*/
/*                 <td class="text-center">{% if zip %}*/
/*                     <span class="text-success"><i class="fa fa-check-circle"></i></span>*/
/*                   {% else %}*/
/*                     <span class="text-danger"><i class="fa fa-minus-circle"></i></span>*/
/*                   {% endif %}</td>*/
/*               </tr>*/
/*               {% if not iconv %}*/
/*                 <tr>*/
/*                   <td>{{ text_mbstring }}</td>*/
/*                   <td>{% if mbstring %}*/
/*                       {{ text_on }}*/
/*                     {% else %}*/
/*                       {{ text_off }}*/
/*                     {% endif %}</td>*/
/*                   <td>{{ text_on }}</td>*/
/*                   <td class="text-center">{% if mbstring %}*/
/*                       <span class="text-success"><i class="fa fa-check-circle"></i></span>*/
/*                     {% else %}*/
/*                       <span class="text-danger"><i class="fa fa-minus-circle"></i></span>*/
/*                     {% endif %}</td>*/
/*                 </tr>*/
/*               {% endif %}*/
/*             </tbody>*/
/*           </table>*/
/*         </fieldset>*/
/*         <p>{{ text_install_file }}</p>*/
/*         <fieldset>*/
/*           <table class="table">*/
/*             <thead>*/
/*               <tr>*/
/*                 <td><b>{{ text_file }}</b></td>*/
/*                 <td><b>{{ text_status }}</b></td>*/
/*               </tr>*/
/*             </thead>*/
/*             <tbody>*/
/*               <tr>*/
/*                 <td>{{ catalog_config }}</td>*/
/*                 <td>{% if not error_catalog_config %}*/
/*                     <span class="text-success">{{ text_writable }}</span>*/
/*                   {% else %}*/
/*                     <span class="text-danger">{{ error_catalog_config }}</span>*/
/*                   {% endif %}</td>*/
/*               </tr>*/
/*               <tr>*/
/*                 <td>{{ admin_config }}</td>*/
/*                 <td>{% if not error_admin_config %}*/
/*                     <span class="text-success">{{ text_writable }}</span>*/
/*                   {% else %}*/
/*                     <span class="text-danger">{{ error_admin_config }}</span>*/
/*                   {% endif %}</td>*/
/*               </tr>*/
/*             </tbody>*/
/*           </table>*/
/*         </fieldset>*/
/*         <div class="buttons">*/
/*           <div class="pull-left"><a href="{{ back }}" class="btn btn-default">{{ button_back }}</a></div>*/
/*           <div class="pull-right">*/
/*             <input type="submit" value="{{ button_continue }}" class="btn btn-primary"/>*/
/*           </div>*/
/*         </div>*/
/*       </form>*/
/*     </div>*/
/*     <div class="col-sm-3">{{ column_left }}</div>*/
/*   </div>*/
/* </div>*/
/* {{ footer }}*/
