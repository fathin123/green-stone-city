/**
 * External dependencies
 */
import { __ } from "@wordpress/i18n";
import { Component, Fragment } from "@wordpress/element";
import {
	Button,
	PanelBody,
	Path,
	Placeholder,
	DateTimePicker,
	RadioControl,
} from "@wordpress/components";
import { InnerBlocks, InspectorControls } from "@wordpress/block-editor";

/**
 * Internal dependencies
 */
import "./editor.scss";

export default function Edit({ attributes, className, setAttributes }) {
	const { date, radioOption, hasScheduledBlock } = attributes;

	const RADIO_OPTIONS = [
		{
			value: "displayBlock",
			label: __("Display block at this time", "schedule-revisions"),
		},
		{
			value: "hideBlock",
			label: __("Hide block at this time", "schedule-revisions"),
		},
	];

	const onClick = (event) => {
		setAttributes({ hasScheduledBlock: true });
	};

	const radioOnChange = (radioOption) => {
		setAttributes({ radioOption });
	};

	const onChangeDate = (dateSelected) => {
		setAttributes({ date: new Date(dateSelected).getTime() });
	};

	return (
		<Fragment>
			{hasScheduledBlock && (
				<InspectorControls>
					<PanelBody>
						<p>
							{__(
								"Change the scheduled date of the content below.",
								"schedule-revisions"
							)}
						</p>
						<RadioControl
							selected={radioOption}
							options={RADIO_OPTIONS}
							onChange={radioOnChange}
						/>
						<DateTimePicker currentDate={date} onChange={onChangeDate} />
					</PanelBody>
				</InspectorControls>
			)}
			{!hasScheduledBlock && (
				<Placeholder
					label={__("Schedule Revisions", "schedule-revisions")}
					className="schedule-revisions-block__settings"
					instructions={__(
						"Select the date and time of which you'd like your block to appear.",
						"schedule-revisions"
					)}
				>
					<RadioControl
						selected={radioOption}
						options={RADIO_OPTIONS}
						onChange={radioOnChange}
					/>
					<DateTimePicker currentDate={date} onChange={onChangeDate} />
					<Button onClick={onClick} isSecondary isLarge>
						{__("Save settings", "schedule-revisions")}
					</Button>
				</Placeholder>
			)}
			{hasScheduledBlock && (
				<div>
					<InnerBlocks templateLock={false} />
				</div>
			)}
		</Fragment>
	);
}
