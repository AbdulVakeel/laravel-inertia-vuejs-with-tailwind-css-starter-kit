<script setup>
import {
	startOfWeek,
	endOfWeek,
	subDays,
	endOfMonth,
	endOfYear,
	startOfMonth,
	startOfYear,
	subMonths,
	format,
} from 'date-fns';

import { useDark } from '@vueuse/core';

const isDark = useDark();

defineProps({
	modelValue: [String, Number, Array],
	id: { type: String },
	label: String,
	error: String,
	help: String,
	range: { type: Boolean, default: true },
});

defineEmits(['update:modelValue']);

const input = ref(null);


defineExpose({ focus: () => input.value.focus() });

const presetRanges = ref([
	{ label: 'Today', range: [new Date(), new Date()] },
	{ label: 'Yesterday', range: [subDays(new Date(), 1), subDays(new Date(), 1)] },
	{ label: 'Last 30 Days', range: [subDays(new Date(), 30), new Date()] },
	{ label: 'This Week', range: [startOfWeek(new Date()), endOfWeek(new Date())] },
	{ label: 'This month', range: [startOfMonth(new Date()), endOfMonth(new Date())] },
	{
		label: 'Last month',
		range: [startOfMonth(subMonths(new Date(), 1)), endOfMonth(subMonths(new Date(), 1))],
	},
	{ label: 'This year', range: [startOfYear(new Date()), endOfYear(new Date())] },
	
]);

const formatDate = (dates) => {
	if (dates && dates.length) {
		return dates.map((date) => {
			return format(date, 'dd.MM.yyyy, HH:mm');
		});
	}
};
</script>

<template>
	<VueDatePicker
		v-if="range"
		:dark="isDark"
		:model-value="modelValue"
		@update:modelValue="$emit('update:modelValue', $event)"
		model-type="yyyy-MM-dd"
		range
		:preset-ranges="presetRanges"
		format="dd-MM-yyyy"
		position="top"
		:auto-position="true"
		input-class-name="py-2 px-10 border-gray-300 focus:border-primary/80 focus:ring focus:ring-primary/20 focus:ring-opacity-50 rounded-lg shadow-sm disabled:bg-gray-50 disabled:text-gray-500 disabled:border-gray-200 disabled:shadow-none placeholder:text-gray-400
		dark:border-gray-700/90 dark:focus:border-primary/80 dark:focus:ring dark:focus:ring-primary/20 dark:focus:ring-opacity-50 dark:shadow-sm dark:disabled:bg-gray-50 dark:disabled:text-gray-500 dark:disabled:border-gray-200 dark:disabled:shadow-none dark:placeholder:text-gray-400 dark:bg-secondary-dark dark:rounded-lg">
		<template #yearly="{ label, range, presetDateRange }">
			<span class="text-light w-28" @click="presetDateRange(range)">{{ label }}</span>
		</template>

		<template #action-row="{ internalModelValue, selectDate, closeMenu }">
			<div class="flex justify-end items-center gap-2 w-full absolute top-0 left-0 sm:-left-64">
				<Button as="button" size="xs" intent="primary" class="block w-40" @click="selectDate">Select</Button>
			</div>
		</template>
	</VueDatePicker>

	<VueDatePicker
		v-else
		:dark="isDark"
		:model-value="modelValue"
		@update:modelValue="$emit('update:modelValue', $event)"
		model-type="yyyy-MM-dd"
		format="dd-MM-yyyy"
		position="top"
		:auto-position="true"
		auto-apply
		input-class-name="py-2 px-10 border-gray-300 focus:border-primary/80 focus:ring focus:ring-primary/20 focus:ring-opacity-50 rounded-lg shadow-sm disabled:bg-gray-50 disabled:text-gray-500 disabled:border-gray-200 disabled:shadow-none placeholder:text-gray-400
		dark:border-gray-700/90 dark:focus:border-primary/80 dark:focus:ring dark:focus:ring-primary/20 dark:focus:ring-opacity-50 dark:shadow-sm dark:disabled:bg-gray-50 dark:disabled:text-gray-500 dark:disabled:border-gray-200 dark:disabled:shadow-none dark:placeholder:text-gray-400 dark:bg-secondary-dark dark:rounded-lg">
		<template #action-row="{ internalModelValue, selectDate, closeMenu }">
			<div class="flex justify-end items-center gap-2 w-full">
				<Button as="button" size="xs" intent="primary" class="block w-full" @click="selectDate">Select</Button>
			</div>
		</template>
	</VueDatePicker>
</template>

<style lang="scss">
.dp__instance_calendar {
	@apply mt-6 sm:mt-0;
}
.dp__preset_ranges {
	margin-top: 20px;
}
.dp__theme_dark {
	--dp-background-color: #0a1e35;
	--dp-text-color: #f5f8fa;
	--dp-hover-color: #334155;
	--dp-hover-text-color: #f5f8fa;
	--dp-hover-icon-color: #959595;
	--dp-primary-color: #fda92d;
	--dp-primary-text-color: #f5f8fa;
	--dp-secondary-color: #a9a9a9;
	--dp-border-color: #2d2d2d;
	--dp-menu-border-color: #2d2d2d;
	--dp-border-color-hover: #aaaeb7;
	--dp-disabled-color: #737373;
	--dp-scroll-bar-background: #161c24;
	--dp-scroll-bar-color: #484848;
	--dp-success-color: #00701a;
	--dp-success-color-disabled: #428f59;
	--dp-icon-color: #959595;
	--dp-danger-color: #e53935;
	--dp-highlight-color: rgba(0, 92, 178, 0.2);
}

.dp__theme_light {
	--dp-background-color: #ffff;
	--dp-text-color: #161c24;
	--dp-hover-color: #f3f3f3;
	--dp-hover-text-color: #161c24;
	--dp-hover-icon-color: #959595;
	--dp-primary-color: #fda92d;
	--dp-primary-text-color: #f8f5f5;
	--dp-secondary-color: #c0c4cc;
	--dp-border-color: #ddd;
	--dp-menu-border-color: #ddd;
	--dp-border-color-hover: #aaaeb7;
	--dp-disabled-color: #f6f6f6;
	--dp-scroll-bar-background: #f3f3f3;
	--dp-scroll-bar-color: #959595;
	--dp-success-color: #76d275;
	--dp-success-color-disabled: #a3d9b1;
	--dp-icon-color: #959595;
	--dp-danger-color: #ff6f60;
	--dp-highlight-color: rgba(25, 118, 210, 0.1);
}

// General
$dp__font_family: Inter, -apple-system, blinkmacsystemfont, 'Segoe UI', roboto, oxygen, ubuntu, cantarell, 'Open Sans',
	'Helvetica Neue', sans-serif !default; // Font size for the menu
$dp__border_radius: 4px !default; // Border radius everywhere
$dp__cell_border_radius: $dp__border_radius !default; // Specific border radius for the calendar cell

// Transitions
$dp__transition_length: 22px !default; // Passed to the translateX in animation
$dp__transition_duration: 0.1s !default; // Transition duration

// Sizing
$dp__button_height: 35px !default; // size for buttons in overlays
$dp__month_year_row_height: 35px !default; // height of the month-year select row
$dp__month_year_row_button_size: 25px !default; // Specific height for the next/previous buttons
$dp__button_icon_height: 20px !default; // icon sizing in buttons
$dp__cell_size: 35px !default; // width and height of calendar cell
$dp__cell_padding: 5px !default; // padding in the cell
$dp__common_padding: 10px !default;
$dp__input_padding: 6px 12px !default; // padding in the input
$dp__input_icon_padding: 35px !default; // Padding on the left side of the input if icon is present
$dp__menu_min_width: 260px !default; // Adjust the min width of the menu
$dp__action_buttons_padding: 2px 5px !default; // Adjust padding for the action buttons in action row
$dp__row_margin: 5px 0 !default; // Adjust the spacing between rows in the calendar
$dp__calendar_header_cell_padding: 0.5rem !default; // Adjust padding in calendar header cells
$dp__two_calendars_spacing: 10px !default; // Space between two calendars if using two calendars
$dp__overlay_col_padding: 3px !default; // Padding in the overlay column
$dp__time_inc_dec_button_size: 32px !default; // Sizing for arrow buttons in the time picker

// Font sizes
$dp__font_size: 1rem !default; // overall font-size
$dp__preview_font_size: 0.8rem !default; // font size of the date preview in the action row
$dp__time_font_size: 2rem !default; // font size in the time picker

.dp__preset_ranges {
	width: 11rem;
}
</style>
