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
	// Pasar argumentos.
	attributes: {
		// toolbar
		align: {
			type: 'string',
			default: '',
		},
		// panel
		ChooseType: {
			type: 'string',
			default: 'posts',
		},
		SetIds: {
			type: 'array',
			default: '',
		},
		SetAmount: {
			type: 'number',
			default: 3,
		},
		SetOrderBy: {
			type: 'string',
			default: 'date',
		},
		SetColumns: {
			type: 'number',
			default: 1,
		},
		FindBlock: {
			type: 'string',
			default: 'none',
		},
		AllowMixed: {
			type: 'boolean',
			default: false,
		},
		AddControls: {
			type: 'boolean',
			default: true,
		},
		AddIndicators: {
			type: 'boolean',
			default: true,
		},
		SetAuto: {
			type: 'boolean',
			default: true,
		},
		SetTime: {
			type: 'number',
			default: '5000',
		},
		SetAnimation: {
			type: 'string',
			default: '',
		},
	},

	edit: Edit,
	// save,
} );


/**
 * Incorporar bloque a una coleccion.
 */
import { registerBlockCollection } from '@wordpress/blocks';
registerBlockCollection( 'create-block', {
	title: 'Coleccion test',
	icon: 'layout',
} );