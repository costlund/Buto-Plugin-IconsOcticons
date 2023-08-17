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
  public function widget_list(){
    $scan_dir = wfFilesystem::getScandir(wfGlobals::getWebDir().'/plugin/icons/octicons/build/svg/');
    /**
     * table_data
     */
    $table_data = array();
    foreach ($scan_dir as $filename) {
      $src = '/plugin/icons/octicons/build/svg/'.$filename;
      $table_data[] = array('name' => wfPhpfunc::str_replace('.svg', '', $filename), 'img' => "<img src=$src>");
    }
    /**
     * 
     */
    $element = new PluginWfYml(__DIR__.'/element/widget_list.yml');
    $element->setByTag(array('table_data' => $table_data));
    wfDocument::renderElement($element);
  }
}
