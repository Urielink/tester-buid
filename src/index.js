import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import './style.scss';
import Edit from './edit';
// import save from './save';
registerBlockType( 'create-block/tester-buid', {
	apiVersion: 2,
	title: __( 'Tester Buid', 'tester-buid' ),
	description: __(
		'Example block written with ESNext standard and JSX support – build step required.',
		'tester-buid'
	),
	category: 'media',
	icon: 'smiley',
	supports: {
		html: false,
		align: [ 'wide', 'full' ],
	},
	attributes:{
		// toolbar
		align: {
			type: 'string',
			default: '',
		},
	},
	edit: Edit,
	// save,
} );
