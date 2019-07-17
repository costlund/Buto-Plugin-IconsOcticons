<?php
/**
 * https://octicons.github.com/
 */
class PluginIconsOcticons{
  public function widget_svg($data){
    $data = new PluginWfArray($data);
    $attribute = new PluginWfArray($data->get('data/attribute'));
    $attribute->set('src', '/plugin/icons/octicons/build/svg/'.$data->get('data/name').'.svg');
    wfDocument::renderElement(array(wfDocument::createHtmlElement('img', null, $attribute->get())));
  }
  public function widget_list($data){
    $data = new PluginWfArray($data);
    $scan_dir = wfFilesystem::getScandir(wfGlobals::getWebDir().'/plugin/icons/octicons/build/svg/');
    $element = array();
    foreach ($scan_dir as $key => $value) {
      $src = '/plugin/icons/octicons/build/svg/'.$value;
      $element[] = wfDocument::createHtmlElement('div', array(
        wfDocument::createHtmlElement('span', str_replace('.svg', null, $value)),
        wfDocument::createHtmlElement('img', null, array('src' => $src))
        ));
    }
    wfDocument::renderElement(array(wfDocument::createHtmlElement('div', $element, array('class' => 'alert alert-info'))));
  }
}
