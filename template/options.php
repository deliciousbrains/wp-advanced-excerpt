<div class="wrap advanced-excerpt">
	<h2><?php _e( "Advanced Excerpt Options", 'advanced-excerpt' ); ?></h2>
	<form method="post" action="">
	<?php if ( function_exists( 'wp_nonce_field' ) ) wp_nonce_field( 'advanced_excerpt_update_options' ); ?>
		<table class="form-table">
			<tr valign="top">
				<th scope="row">
					<label for="length">
					<?php _e( "Excerpt Length:", 'advanced-excerpt' ); ?>
					</label>
				</th>
				<td>
					<input name="length" type="text" id="length" value="<?php echo $length; ?>" size="2" />
					<select name="length_type">
						<option value="characters"<?php echo ( 'characters' == $length_type ) ? ' selected="selected"' : ''; ?>><?php _e( "Characters", 'advanced-excerpt' ); ?></option>
						<option value="words"<?php echo ( 'words' == $length_type ) ? ' selected="selected"' : ''; ?>><?php _e( "Words", 'advanced-excerpt' ); ?></option>
					</select> 
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="ellipsis">
					<?php _e( "Ellipsis:", 'advanced-excerpt' ); ?>
					</label>
				</th>
				<td>
					<p>
						<input name="ellipsis" type="text" id="ellipsis" value="<?php echo $ellipsis; ?>" size="5" />
						<?php printf( __( '(use <a href="%s" target="_blank">HTML entities</a>)', 'advanced-excerpt' ), 'http://entitycode.com' ); ?>
					</p>
					<p class="description"><?php _e( "Will substitute the part of the post that is omitted in the excerpt.", 'advanced-excerpt' ); ?></p>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<?php _e( "Finish:", 'advanced-excerpt' ); ?>
				</th>
				<td>
					<p>
						<label for="finish-none">
						<input type="radio" id="finish-none" name="finish" value="exact"<?php echo ( 'exact' == $finish ) ? ' checked="checked"' : ''; ?> />
						<?php _e( "Exact", 'advanced-excerpt' ); ?>
						</label><br />
						<label for="finish-word">
						<input type="radio" id="finish-word" name="finish" value="word"<?php echo ( 'word' == $finish ) ? ' checked="checked"' : ''; ?> />
						<?php _e( "Word", 'advanced-excerpt' ); ?>
						</label><br />
						<label for="finish-sentence">
						<input type="radio" id="finish-sentence" name="finish" value="sentence"<?php echo ( 'sentence' == $finish ) ? ' checked="checked"' : ''; ?> />
						<?php _e( "Sentence", 'advanced-excerpt' ); ?>
						</label>
					</p>

					<p class="description"><?php _e( "Prevents cutting a word or sentence at the end of an excerpt. This option can result in (slightly) longer excerpts.", 'advanced-excerpt' ); ?></p>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="read-more">
					<?php _e( "&lsquo;Read-more&rsquo; Text:", 'advanced-excerpt' ); ?>
					</label>
				</th>
				<td>
					<input name="read_more" type="text" id="read-more" value="<?php echo $read_more; ?>" />
					<label for="add-link">
					<input name="add_link" type="checkbox" id="add-link" value="on" <?php echo ( 1 == $add_link ) ? 'checked="checked"' : ''; ?> />
					<?php _e( "Add link to excerpt", 'advanced-excerpt' ); ?>
					</label>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="no-custom">
					<?php _e( "No Custom Excerpts:", 'advanced-excerpt' ); ?>
					</label>
				</th>
				<td>
					<label for="no-custom">
					<input name="no_custom" type="checkbox" id="no-custom" value="on" <?php echo ( 1 == $no_custom ) ? 'checked="checked"' : ''; ?> />
					<?php _e( "Generate excerpts even if a post has a custom excerpt attached.", 'advanced-excerpt' ); ?>
					</label>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="no-shortcode">
					<?php _e( "Strip Shortcodes:", 'advanced-excerpt' ); ?>
					</label>
				</th>
				<td>
					<label for="no-shortcode">
					<input name="no_shortcode" type="checkbox" id="no-shortcode" value="on" <?php echo ( 1 == $no_shortcode ) ? 'checked="checked"' : ''; ?> />
					<?php _e( "Remove shortcodes from the excerpt. <em>(recommended)</em>", 'advanced-excerpt' ); ?>
					</label>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<?php _e( "Filter:", 'advanced-excerpt' ); ?>
				</th>
				<td>
					<p>
						<label for="the-excerpt">
						<input name="the_excerpt" type="checkbox" id="the-excerpt" value="on" <?php echo ( 1 == $the_excerpt ) ? 'checked="checked"' : ''; ?> />
						<span class='monospaced'>the_excerpt()</span>
						</label><br />
						<label for="the-content">
						<input name="the_content" type="checkbox" id="the-content" value="on" <?php echo ( 1 == $the_content ) ? 'checked="checked"' : ''; ?> />
						<span class='monospaced'>the_content()</span>
						</label>
					<p>

					<p class="description">
						<?php _e( 'Themes may use <code>the_excerpt()</code> for some pages (e.g. search results) and <code>the_content()</code> on others (e.g. blog archives).<br />Depending on your theme and what pages you want this plugin to affect, you may need to adjust these settings.' ); ?>
					</p>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<?php _e( "Disable On:", 'advanced-excerpt' ); ?>
				</th>
				<td>
					<p>
						<?php foreach ( $exclude_pages_list as $key => $label ) : 
							$key_dashed = str_replace( '_', '-', $key ); ?>
							<label for="<?php echo $key_dashed; ?>">
							<input name="exclude_pages[]" type="checkbox" id="<?php echo $key_dashed; ?>" value="<?php echo $key; ?>" <?php echo ( in_array( $key, $exclude_pages ) ) ? 'checked="checked"' : ''; ?> />
							<?php echo $label; ?>
							</label><br />
						<?php endforeach; ?>
					<p>

					<p class="description">
						<?php _e( 'Disables excerpt filtering for certain page types.', 'advanced-excerpt' ); ?>
					</p>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e( "Keep Markup:", 'advanced-excerpt' ); ?></th>
				<td>
					<table id="tags-table">
						<tr>
							<td colspan="<?php echo $tag_cols; ?>">
								<label for="allowed-tags">
								<input name="allowed_tags[]" type="checkbox" id="allowed-tags" value="_all" <?php echo ( in_array( '_all', $allowed_tags ) ) ? 'checked="checked" ' : ''; ?> />
		   						<?php _e( "Don't remove any markup", 'advanced-excerpt' ); ?>
		   						</label>
							</td>
						</tr>
						<?php
						$i = 0;
						foreach ( $tag_list as $tag ) :
							if ( $tag == '_all' ) continue;
							if ( 0 == $i % $tag_cols ) : ?>
							<tr>
							<?php endif; $i++; ?>
								<td>
									<label for="<?php echo 'ae-' . $tag; ?>">
									<input name="allowed_tags[]" type="checkbox" id="<?php echo 'ae-' . $tag; ?>" value="<?php echo $tag; ?>" <?php echo ( in_array( $tag, $allowed_tags ) ) ? 'checked="checked" ' : ''; ?> />
									<code><?php echo $tag; ?></code>
									</label>
								</td>
								<?php
								if ( 0 == $i % $tag_cols ):
									$i = 0;
								echo '</tr>';
								endif;
								endforeach;
								if ( 0 != $i % $tag_cols ): ?>
						 			<td colspan="<?php echo $tag_cols - $i; ?>">&nbsp;</td>
							</tr>
							<?php endif; ?>
					</table>

					<a href="" id="select-all"><?php _e( "Select all", 'advanced-excerpt' ); ?></a> / <a href="" id="select-none"><?php _e( "Select none", 'advanced-excerpt' ); ?></a><br />
					<?php _e( "More tags", 'advanced-excerpt' ); ?>
					<select name="more_tags" id="more-tags">
					<?php foreach ( array_diff( $this->options_all_tags, $this->options_basic_tags ) as $tag ) : ?>
						<option value="<?php echo $tag; ?>"><?php echo $tag; ?></option>
					<?php endforeach; ?>
					</select>

					<input type="button" name="add_tag" id="add-tag" class="button" value="<?php _e( "Add tag", 'advanced-excerpt' ); ?>" />
				</td>
			</tr>
		</table>
		<p class="submit"><input type="submit" name="Submit" class="button-primary" value="<?php _e( "Save Changes", 'advanced-excerpt' ); ?>" /></p>
	</form>
</div>