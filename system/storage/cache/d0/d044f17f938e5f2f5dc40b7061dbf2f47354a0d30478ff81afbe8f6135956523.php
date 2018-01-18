<?php

/* 3rd_party/maxmind.twig */
class __TwigTemplate_9991c0b747a1a1e44b932844189a472b8229576ab582875c309bd059f82ae4d7 extends Twig_Template
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
        <h3>";
        // line 6
        echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
        echo "<br>
          <small>";
        // line 7
        echo (isset($context["text_maxmind"]) ? $context["text_maxmind"] : null);
        echo "</small></h3>
      </div>
      <div class=\"col-sm-6\">
        <div id=\"logo\" class=\"pull-right hidden-xs\"><img src=\"view/image/logo.png\" alt=\"OpenCart\" title=\"OpenCart\" /></div>
      </div>
    </div>
  </header>
  <div class=\"row\">
    <div class=\"col-sm-12\">
      <form action=\"";
        // line 16
        echo (isset($context["action"]) ? $context["action"] : null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" class=\"form-horizontal\">
        <p>";
        // line 17
        echo (isset($context["text_signup"]) ? $context["text_signup"] : null);
        echo "</p>
        <fieldset>
          <div class=\"form-group required\">
            <label class=\"col-sm-2 control-label\" for=\"input-key\">";
        // line 20
        echo (isset($context["entry_key"]) ? $context["entry_key"] : null);
        echo "</label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"fraud_maxmind_key\" value=\"";
        // line 22
        echo (isset($context["fraud_maxmind_key"]) ? $context["fraud_maxmind_key"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_key"]) ? $context["entry_key"] : null);
        echo "\" id=\"input-key\" class=\"form-control\" />
              ";
        // line 23
        if ((isset($context["error_key"]) ? $context["error_key"] : null)) {
            // line 24
            echo "              <div class=\"text-danger\">";
            echo (isset($context["error_key"]) ? $context["error_key"] : null);
            echo "</div>
              ";
        }
        // line 25
        echo " </div>
          </div>
          <div class=\"form-group required\">
            <label class=\"col-sm-2 control-label\" for=\"input-score\">";
        // line 28
        echo (isset($context["entry_score"]) ? $context["entry_score"] : null);
        echo "</label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"fraud_maxmind_score\" value=\"";
        // line 30
        echo (isset($context["fraud_maxmind_score"]) ? $context["fraud_maxmind_score"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_score"]) ? $context["entry_score"] : null);
        echo "\" id=\"input-score\" class=\"form-control\" />
              <div class=\"help\">";
        // line 31
        echo (isset($context["help_score"]) ? $context["help_score"] : null);
        echo "</div>
              ";
        // line 32
        if ((isset($context["error_score"]) ? $context["error_score"] : null)) {
            // line 33
            echo "              <div class=\"text-danger\">";
            echo (isset($context["error_score"]) ? $context["error_score"] : null);
            echo "</div>
              ";
        }
        // line 34
        echo " </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-order-status\">";
        // line 37
        echo (isset($context["entry_order_status"]) ? $context["entry_order_status"] : null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select name=\"maxmind_order_status_id\" id=\"input-order-status\" class=\"form-control\">
                
                ";
        // line 41
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["order_statuses"]) ? $context["order_statuses"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
            // line 42
            echo "                ";
            if (($this->getAttribute($context["order_status"], "order_status_id", array()) == (isset($context["maxmind_order_status_id"]) ? $context["maxmind_order_status_id"] : null))) {
                // line 43
                echo "                
                <option value=\"";
                // line 44
                echo $this->getAttribute($context["order_status"], "order_status_id", array());
                echo "\" selected=\"selected\">";
                echo $this->getAttribute($context["order_status"], "name", array());
                echo "</option>
                
                ";
            } else {
                // line 47
                echo "                
                <option value=\"";
                // line 48
                echo $this->getAttribute($context["order_status"], "order_status_id", array());
                echo "\">";
                echo $this->getAttribute($context["order_status"], "name", array());
                echo "</option>
                
                ";
            }
            // line 51
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 52
        echo "              
              </select>
              <div class=\"help\">";
        // line 54
        echo (isset($context["help_order_status"]) ? $context["help_order_status"] : null);
        echo "</div>
            </div>
          </div>
        </fieldset>
        <div class=\"buttons\">
          <div class=\"pull-left\"><a href=\"";
        // line 59
        echo (isset($context["back"]) ? $context["back"] : null);
        echo "\" class=\"btn btn-default\">";
        echo (isset($context["button_back"]) ? $context["button_back"] : null);
        echo "</a></div>
          <div class=\"pull-right\">
            <input type=\"submit\" value=\"";
        // line 61
        echo (isset($context["button_continue"]) ? $context["button_continue"] : null);
        echo "\" class=\"btn btn-primary\" />
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
";
        // line 68
        echo (isset($context["footer"]) ? $context["footer"] : null);
        echo " ";
    }

    public function getTemplateName()
    {
        return "3rd_party/maxmind.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  176 => 68,  166 => 61,  159 => 59,  151 => 54,  147 => 52,  141 => 51,  133 => 48,  130 => 47,  122 => 44,  119 => 43,  116 => 42,  112 => 41,  105 => 37,  100 => 34,  94 => 33,  92 => 32,  88 => 31,  82 => 30,  77 => 28,  72 => 25,  66 => 24,  64 => 23,  58 => 22,  53 => 20,  47 => 17,  43 => 16,  31 => 7,  27 => 6,  19 => 1,);
    }
}
/* {{ header }}*/
/* <div class="container">*/
/*   <header>*/
/*     <div class="row">*/
/*       <div class="col-sm-6">*/
/*         <h3>{{ heading_title }}<br>*/
/*           <small>{{ text_maxmind }}</small></h3>*/
/*       </div>*/
/*       <div class="col-sm-6">*/
/*         <div id="logo" class="pull-right hidden-xs"><img src="view/image/logo.png" alt="OpenCart" title="OpenCart" /></div>*/
/*       </div>*/
/*     </div>*/
/*   </header>*/
/*   <div class="row">*/
/*     <div class="col-sm-12">*/
/*       <form action="{{ action }}" method="post" enctype="multipart/form-data" class="form-horizontal">*/
/*         <p>{{ text_signup }}</p>*/
/*         <fieldset>*/
/*           <div class="form-group required">*/
/*             <label class="col-sm-2 control-label" for="input-key">{{ entry_key }}</label>*/
/*             <div class="col-sm-10">*/
/*               <input type="text" name="fraud_maxmind_key" value="{{ fraud_maxmind_key }}" placeholder="{{ entry_key }}" id="input-key" class="form-control" />*/
/*               {% if error_key %}*/
/*               <div class="text-danger">{{ error_key }}</div>*/
/*               {% endif %} </div>*/
/*           </div>*/
/*           <div class="form-group required">*/
/*             <label class="col-sm-2 control-label" for="input-score">{{ entry_score }}</label>*/
/*             <div class="col-sm-10">*/
/*               <input type="text" name="fraud_maxmind_score" value="{{ fraud_maxmind_score }}" placeholder="{{ entry_score }}" id="input-score" class="form-control" />*/
/*               <div class="help">{{ help_score }}</div>*/
/*               {% if error_score %}*/
/*               <div class="text-danger">{{ error_score }}</div>*/
/*               {% endif %} </div>*/
/*           </div>*/
/*           <div class="form-group">*/
/*             <label class="col-sm-2 control-label" for="input-order-status">{{ entry_order_status }}</label>*/
/*             <div class="col-sm-10">*/
/*               <select name="maxmind_order_status_id" id="input-order-status" class="form-control">*/
/*                 */
/*                 {% for order_status in order_statuses %}*/
/*                 {% if order_status.order_status_id == maxmind_order_status_id %}*/
/*                 */
/*                 <option value="{{ order_status.order_status_id }}" selected="selected">{{ order_status.name }}</option>*/
/*                 */
/*                 {% else %}*/
/*                 */
/*                 <option value="{{ order_status.order_status_id }}">{{ order_status.name }}</option>*/
/*                 */
/*                 {% endif %}*/
/*                 {% endfor %}*/
/*               */
/*               </select>*/
/*               <div class="help">{{ help_order_status }}</div>*/
/*             </div>*/
/*           </div>*/
/*         </fieldset>*/
/*         <div class="buttons">*/
/*           <div class="pull-left"><a href="{{ back }}" class="btn btn-default">{{ button_back }}</a></div>*/
/*           <div class="pull-right">*/
/*             <input type="submit" value="{{ button_continue }}" class="btn btn-primary" />*/
/*           </div>*/
/*         </div>*/
/*       </form>*/
/*     </div>*/
/*   </div>*/
/* </div>*/
/* {{ footer }} */
