/**
 * External dependencies
 */
import { registerBlockType } from "@wordpress/blocks";
import { __ } from "@wordpress/i18n";

/**
 * Internal dependencies
 */
import Edit from "./edit";
import save from "./save";

registerBlockType("schedule-revisions/schedule-revisions-block", {
	title: __("Schedule Revisions", "schedule-revisions"),

	description: __(
		"Allow content within your post to appear or disappear at a certain time.",
		"schedule-revisions"
	),

	category: "common",

	keywords: [
		__("timer", "schedule-revisions"),
		__("wait", "schedule-revisions"),
		__("revisions", "schedule-revisions"),
	],

	attributes: {
		date: {
			type: "number",
			default: new Date(),
		},
		radioOption: {
			type: "string",
			default: "displayBlock",
		},
		hasScheduledBlock: {
			type: "boolean",
			default: false,
		},
	},

	icon: "clock",

	supports: {
		html: false,
	},

	edit: Edit,

	save,
});
