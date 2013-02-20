<?php
/**
 * Include plugin (locallink component)
 *
 * @license GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author  Michael Hamann <michael@content-space.de>
 */

if (!defined('DOKU_INC')) die('must be used inside DokuWiki');

class syntax_plugin_include_locallink extends DokuWiki_Syntax_Plugin {

    function getType() {
        return 'formatting';
    }

    function getSort() {
        return 50;
    }

    function handle($match, $state, $pos, &$handler) {
        // this is a syntax plugin that doesn't offer any syntax, so there's nothing to handle by the parser
    }

    /**
     * Displays a local link to an included page
     *
     * @author Michael Hamann <michael@content-space.de>
     */
    function render($mode, &$renderer, $data) {
        if ($mode == 'xhtml') {
            /** @var Doku_Renderer_xhtml $renderer */
            list($hash, $name) = $data;
            global $ID;
            $name  = $renderer->_getLinkTitle($name, $hash, $isImage);
            $title = $ID.' ↵';
            $renderer->doc .= '<a href="#'.$hash.'" title="'.$title.'" class="wikilink1">';
            $renderer->doc .= $name;
            $renderer->doc .= '</a>';
            return true;
        }
        return false;
    }
}
// vim:ts=4:sw=4:et:
