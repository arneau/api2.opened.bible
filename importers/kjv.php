<?

require_once '../libs/simple_html_dom.php';

//$html = file_get_html('https://www.blueletterbible.org/kjv/jhn/3/1/rl1/s_1000001');
$html = <<<s
<table class="bibleTable" id="bibleTable" border="0" cellspacing="0" cellpadding="0">
							<tbody>
  		
			<tr id="verse_1000003">
				<td><p>
						<a id="ta_1000003" rel="tools"><img src="/assets/images/bible/btnT_a.png" alt="Tools specific to Jhn 3:3" id="yui-gen3"></a>
					</p>
				</td>
				<td id="yui-gen152"><p>
						<img src="/assets/images/copyChkboxOff.gif" alt="Unchecked Copy Box" class="copyBox" id="copy_1000003">
						<a href="/kjv/jhn/3/3/s_1000003" id="va_1000003" rel="tools">Jhn 3:3</a>
					</p>
				</td>
			
				<td id="yui-gen128"><span class="pMarkers">¶</span><div id="yui-gen153">Jesus answered and said unto him, <span class="rl" id="yui-gen138">Verily, verily, I say unto thee, Except a man be born again, he cannot see the kingdom of God.</span></div></td>
			
			</tr>
  		
			<tr id="verse_1000004">
				<td id="yui-gen120"><p>
						<a id="ta_1000004" rel="tools"><img src="/assets/images/bible/btnT_a.png" alt="Tools specific to Jhn 3:4" id="yui-gen4"></a>
					</p>
				</td>
				<td id="yui-gen150"><p id="yui-gen151">
						<img src="/assets/images/copyChkboxOff.gif" alt="Unchecked Copy Box" class="copyBox" id="copy_1000004">
						<a href="/kjv/jhn/3/4/s_1000004" id="va_1000004" rel="tools">Jhn 3:4</a>
					</p>
				</td>
			
				<td id="yui-gen130"><span class="pMarkers">¶</span><div id="yui-gen129">Nicodemus saith unto him, How can a man be born when he is old? can he enter the second time into his mother's womb, and be born?</div></td>
			
			</tr>
  		
			<tr id="verse_1000005">
				<td id="yui-gen119"><p>
						<a id="ta_1000005" rel="tools"><img src="/assets/images/bible/btnT_a.png" alt="Tools specific to Jhn 3:5" id="yui-gen5"></a>
					</p>
				</td>
				<td id="yui-gen136"><p id="yui-gen135">
						<img src="/assets/images/copyChkboxOff.gif" alt="Unchecked Copy Box" class="copyBox" id="copy_1000005">
						<a href="/kjv/jhn/3/5/s_1000005" id="va_1000005" rel="tools">Jhn 3:5</a>
					</p>
				</td>
			
				<td id="yui-gen69"><span class="pMarkers">¶</span><div id="yui-gen70">Jesus answered, <span class="rl" id="yui-gen71">Verily, verily, I say unto thee, Except a man be born of water and <em>of</em> the Spirit, he cannot enter into the kingdom of God.</span></div></td>
			
			</tr>
  		
								
								<tr class="interrupt" id="interruptRow" style="display:none;">
									<td colspan="3">
										<div id="interruptDiv">
											<div class="interArrow"><img src="/assets/images/bible/interArrow.png" alt="Interlinear Arrow"></div>
											<div class="interTools" id="interTools"><img id="conc_VERSE" src="/assets/images/tabs/tabInterlinear_a.png" alt="Interlinear Tab"><img id="bibles_VERSE" src="/assets/images/tabs/tabBibles_a.png" alt="Bibles Tab"><img id="corr_VERSE" src="/assets/images/tabs/tabCrossrefs_a.png" alt="TSK Tab"><img id="comms_VERSE" src="/assets/images/tabs/tabCommentaries_a.png" alt="Commentaries Tab"><img id="refs_VERSE" src="/assets/images/tabs/tabDictionaries_a.png" alt="Dictionaries Tab"><img id="misc_VERSE" src="/assets/images/tabs/tabMisc_a.png" alt="Miscellaneous Tab"></div>
											<div class="interClose" id="interClose"><img src="/assets/images/bible/tab_bibleX_a.png" alt="Close Bible Tools" title="Close Bible Tools" onclick="BLB.Bible.closeWedge();" id="yui-gen37"></div>
											<div id="interLoad"><img src="/assets/images/loading1.gif" alt="Waiting for the content to load"></div>
											<div id="concData"></div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
s;
$html = str_get_html($html);

$verses = $html->find('#bibleTable tr');

foreach ($verses as $verse) {

	$passage_identifier = $verse->firstchild()->nextSibling()->plaintext;
	$passage_identifier = trim($passage_identifier);

	$verse_number = substr($passage_identifier, strpos($passage_identifier, ':') + 1);

	$verse_html = $verse->lastchild()->lastchild()->innertext;
	$verse_html = trim($verse_html);
	$verse_html = str_replace([
		'<em>',
		'</em>'
	], [
		'<i>',
		'</i>'
	], $verse_html);

	var_dump($verse_number, $verse_html);

}

?>