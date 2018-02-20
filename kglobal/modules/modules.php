<?php if( have_rows('module') ): $iterator=0;

		while( have_rows('module') ): the_row();

			$type = get_sub_field('module_type');

				$iterator++;
				include ($type.'.php');

		endwhile;

endif; ?>
