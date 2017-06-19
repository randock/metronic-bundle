<?php

declare(strict_types=1);

namespace Randock\MetronicBundle;

use Randock\MetronicBundle\DependencyInjection\Compiler\HeaderListPass;
use Randock\MetronicBundle\DependencyInjection\Compiler\MenuPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class RandockMetronicBundle.
 */
class RandockMetronicBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->loadFromExtension('assetic', array(
            'assets' => array(
                'randock_metronic_css' => array(
                    'inputs' => array(
                        "bundles/randockmetronic/assets/global/plugins/font-awesome/css/font-awesome.min.css",
                        "bundles/randockmetronic/assets/global/plugins/simple-line-icons/simple-line-icons.min.css",

                        "bundles/randockmetronic/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css",
                    ),
                ),
                'randock_metronic_scss' => array(
                    'inputs' => array(
                        "bundles/randockmetronic/sass/bootstrap.scss",

                        "bundles/randockmetronic/sass/global/components-md.scss",
                        "bundles/randockmetronic/sass/global/plugins-md.scss",

                        "bundles/randockmetronic/sass/layouts/layout3/layout.scss",
                        "bundles/randockmetronic/sass/layouts/layout3/themes/default.scss",
                        "bundles/randockmetronic/sass/layouts/layout3/custom.scss",
                    ),
                ),
                'randock_metronic_js' => array(
                    'inputs' => array(
                        "@RandockMetronicBundle/Resources/public/assets/global/plugins/jquery.min.js",
                        "@RandockMetronicBundle/Resources/public/assets/global/plugins/bootstrap/js/bootstrap.min.js",
                        "@RandockMetronicBundle/Resources/public/assets/global/plugins/js.cookie.min.js",
                        "@RandockMetronicBundle/Resources/public/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js",
                        "@RandockMetronicBundle/Resources/public/assets/global/plugins/jquery.blockui.min.js",
                        "@RandockMetronicBundle/Resources/public/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js",
                        "@RandockMetronicBundle/Resources/public/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js",

                        "@RandockMetronicBundle/Resources/public/assets/global/scripts/datatable.js",
                        "@RandockMetronicBundle/Resources/public/assets/global/plugins/datatables/datatables.min.js",
                        "@RandockMetronicBundle/Resources/public/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js",
                        "@RandockMetronicBundle/Resources/public/assets/global/plugins/jquery-validation/js/jquery.validate.js",

                        "@RandockMetronicBundle/Resources/public/assets/global/scripts/app.min.js",

                        "@RandockMetronicBundle/Resources/public/assets/layouts/layout3/scripts/layout.min.js",
                        "@RandockMetronicBundle/Resources/public/assets/layouts/layout3/scripts/demo.js",
                        "@RandockMetronicBundle/Resources/public/assets/layouts/global/scripts/quick-sidebar.min.js",
                        "@RandockMetronicBundle/Resources/public/assets/layouts/global/scripts/quick-nav.min.js",
                    ),
                ),
            ),
        ));

        $container->loadFromExtension('twig', array(
            'paths' => array(
                '%kernel.root_dir%/../vendor/randock/metronic-bundle/src/Resources/views' => 'RandockMetronicBundle',
            ),
        ));

        $container->addCompilerPass(new HeaderListPass());
        $container->addCompilerPass(new MenuPass());

    }
}
