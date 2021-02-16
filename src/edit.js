
import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import ServerSideRender from '@wordpress/server-side-render';
import './editor.scss';


export default function Edit(props) {

	const blockProps = useBlockProps();
	// const { attributes, setAttributes, blockProps = useBlockProps() } = props;

	return (
		<div {...blockProps}>
			<ServerSideRender
				block="create-block/tester-buid"
				attributes={ props.attributes }
			/>
		</div>
	);
}
