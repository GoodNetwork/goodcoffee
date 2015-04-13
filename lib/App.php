<?php
use Parse\ParseClient;
use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\Internal\SetOperation;

namespace GoodNetwork;

class App
{

    /**
    * Configuration
    *
    * @var array
    */
    public $config = array();

    /**
    * View data
    *
    * @var array
    */
    public $viewData = array();

    /**
    * Enable or disable layout
    *
    * @var bool
    */
    public $enableLayout = true;

    /**
    * Slim object
    *
    * @var Slim
    */
    public $slim;

    /**
    * Base directory of current active theme
    *
    * @var string
    */
    public $themeBase;

    /**
    * Constructor
    *
    * @param Slim $slim Object of slim
    */
    public function __construct(\Slim\Slim $slim, $config)
    {
        $this->slim = $slim;
        $this->setConfig($config);
        if (isset($config['cache']) && $config['cache']['enabled']) {
            $this->slim->add(new Cache($config['cache']));
        }
    }

    /**
    * Set configurations
    *
    * @param array $config Configuration array
    */
    public function setConfig($config)
    {
        $this->config = $config;
        $this->slim->config($config);
    }

    /**
    * Getter function to get config variable
    *
    * @var string $configVar Config variable
    * @return Configuration value
    */
    public function getConfig($configVar)
    {
        return isset($this->config[$configVar])
                ? $this->config[$configVar]
                : null ;
    }

    /**
    * Initialize
    */
    public function init()
    {
    	\Parse\ParseClient::initialize( 'avOitl6OoNQJr7WwKgO4XfHEWIu2smvZpFXnzBFK', 'uu7bWmJBcjFHWsVxq0840bgZNyabI5tKk8sylY4w', '8v73tJ0MWk0ktq2UavL5Cd669storiqppHfJhZib' );
        $this->themeBase = './templates';
        $this->slim->view()->setTemplatesDirectory($this->themeBase);
        $this->setViewConfig();
        $this->setRoutes();
    }

   /**
    * Warpper function to get host URL.
    * From site.baseurl or auto detected by Slim.
    *
    * @return Host URL string
    */
    public function getUrl()
    {
        return $this->getConfig('site.baseurl')
                ? $this->getConfig('site.baseurl')
                : $this->slim->request()->getUrl();
    }

    /**
    * Custom 404 handler
    * Function can be called for handling 404 errors
    */
    public function notFound()
    {
        $this->slim->notFound();
    }

    /**
    * Set Application routes based on the routes specified in config
    * Also sets layout file if it's enabled for that specific route
    */
    public function setRoutes()
    {
        $this->_routes = $this->getConfig('routes');
        $self = $this;
        $prefix = $this->getConfig('prefix');
        foreach ($this->_routes as $key => $value) {
            $this->slim->map($prefix . $value['route'], function() use($self, $key, $value){
                $args = func_get_args();
                $layout = isset($value['layout']) ? $value['layout'] : true;

                // This will store a custom function if defined into the route
                $custom = isset($value['custom']) ? $value['custom'] : false;

                $self->slim->view()->appendGlobalData(array("route" => $key));
                $template = isset($value['template']) ? $value['template'] : false;

                //set view data for article  and archives routes
                switch ($key) {
                    case 'home':
                    	// $query = new \Parse\ParseQuery("Venue");
                    	// $query->descending("createdAt");
                    	// $query->limit(6);
                    	// $results = $query->find();
                    	// $this->viewData['venues'] = $results;
                        break;

                    case 'venue':
                    	// $query = new \Parse\ParseQuery("Venue");
                    	// $venue = $query->get($args[0]);
                    	// $this->viewData['venue'] = $venue;
                    	break;

                    // If key is not matched, check if a custom function is declared
                    default:
                        if ($custom && is_callable($custom))
                            call_user_func($custom, $self, $key, $value);
                        break;
                }
                if(!$layout){
                    $self->enableLayout = false;
                }
                else{
                    $self->setLayout($layout);
                }
                // render the template file
                $self->render($template);

            })->via('GET')
              ->name($key)
              ->conditions(
                isset($value['conditions']) ? $value['conditions']: array()
            );
        }

        // Register not found handler
        $this->slim->notFound(function () use ($self) {
            $self->slim->render('404');
        });
    }

    /**
    * Set config values to View
    * @todo make it comfortable
    */
    public function setViewConfig()
    {
        $themeDir   = ltrim($this->themeBase, "./");
        $themeBase  = "/" . $themeDir;
        $data = array(
                'date.format' => $this->getConfig('date.format'),
                'author.name' => $this->getConfig('author.name'),
                'site.name' => $this->getConfig('site.name'),
                'site.title' => $this->getConfig('site.title'),
                'site.description' => $this->getConfig('site.description'),
                'disqus.username' => $this->getConfig('disqus.username'),
                'assets.prefix' => $this->getConfig('assets.prefix'),
                'google.analytics' => $this->getConfig('google.analytics'),
                'prefix' => $this->getConfig('prefix'),
                'base.url' => $this->getUrl()
            );
        $this->slim->view()->appendGlobalData($data);
    }

    /**
    * Helper function for date formatting
    *
    * @param $date Input date
    * @param $format Date format
    */
    public function dateFormat($date,$format=null)
    {
        $format = is_null($format) ? $this->getConfig('date.format') : $format;
        $date  = new \DateTime($date);
        return $date->format($format);
    }

    /**
    * @return array view data
    */
    public function getViewData($key = null)
    {
        return is_null($key)
                    ? $this->viewData
                    : ( isset($this->viewData[$key])
                        ? $this->viewData[$key]
                        : false );
    }

    /**
    * Set layout file
    */
    public function setLayout($layout)
    {
        $layoutFile = is_bool($layout) ? $this->slim->config('layout.file') . '.php'
                                       : $layout . ".php";
        $this->slim->view()->setLayout($layoutFile);
    }

    /**
    * Render template
    *
    * @param string $template template file to be rendered
    */
    public function render($template)
    {
        $this->slim->render($template,$this->getViewData());
    }

    /**
    * Run slim
    */
    public function run()
    {
        $this->init();
        $this->slim->run();
    }
}
