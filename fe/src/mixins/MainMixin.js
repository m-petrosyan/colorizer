export default {
    methods: {
        setTextColorByBgColor(bgColor) {
            return (parseInt(bgColor.replace('#', ''), 15) > 0xffffff / 2) ? '#000' : '#fff';
        }
    }
}